<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use App\Cliente;


class GeneralSegurosController extends Controller
{
    //

    protected $opts,$params,$urlAuth,$urlCotiza,$token,$urlCat,$urlCatAuto,$urlCober;

    public function __construct(){

    	$this->opts = array(
		  'http'=> array('header'=>array('Content-Type:application/soap+xml; charset=utf-8'))
		);
		$this->params = array ('encoding' => 'UTF-8', 'soap_version' => SOAP_1_1,'stream_context' => stream_context_create($this->opts) );
    	 // DATOS GENERAL DE SEGUROS
		$this->urlAuth = "http://201.151.228.153:9080/gsautos-wsDesa/soap/autenticacionWS?wsdl";
		$this->urlCotiza = "http://201.151.228.153:9080/gsautos-wsDesa/soap/cotizacionEmisionWS?wsdl";
		$this->urlCat = "http://201.151.228.153:9080/gsautos-wsDesa/soap/catalogosWS?wsdl";
		$this->urlCatAuto = "http://201.151.228.153:9080/gsautos-wsDesa/soap/catalogoAutosWS?wsdl";
		$this->urlCober = "http://201.151.228.153:9080/gsautos-wsDesa/soap/catalogoCoberturasWS?wsdl";
		try{
			$this->clientAuthGS = $this->getClient($this->urlAuth);
			
			// $this->clientCotGS = new SoapClient($this->urlCotiza,$this->params);
		}
		catch(SoapFault $fault){
			dd($fault);
		}
		// get token
		$this->token = $this->getToken();
		$this->middleware(function ($request,$next){
			if ($this->token) {
				return $next($request);
			}
			else{
				return response()->json(['error'=>'token is null']);
			}
		});
    }

    public function getClient($url)
    {
        try{
            $client = new SoapClient($url,$this->params);
    	   return $client;

        }
        catch(FatalErrorException $error){
            dd($error);
        }
    }

    public function getToken()
    {

    	// dd($this->clientAuthGS->__getTypes());
    	$result = $this->clientAuthGS->obtenerToken(['arg0'=>["usuario"=>'ATC0','password'=>'2r2kGdeUA0']]);
    	$response = json_decode(json_encode($result),true);
    	if ($response['return']['exito']) {
    		return $response['return']['token'];
    		
    	}
    	else{
    		return null;
    	}
    }

    public function getCotizacion(Request $request){
    	$cliente = Cliente::where('cotizacion',$request->cotizacion)->first();
    	// dd($cliente['tipoServicio']);
    	$soapClient = $this->getClient($this->urlCotiza);
    	// dd($soapClient->__getTypes());
    	try{
            // dd($cliente->tipoServicio);
	    	$res = $soapClient->generarCotizacion(['arg0'=>['token'=>$this->token,'configuracionProducto'=>"RESIDENTE_INDIVIDUAL",'cp'=>$cliente->cp,'descuento'=>0,'vigencia'=>"ANUAL",'inciso'=>['claveGs'=>$cliente->auto->version->amis_gs,"conductorMenor30"=>$cliente->menor30,'modelo'=>$cliente->auto->submarca->anio,'tipoServicio'=>$cliente->tipoServicio,'tipoValor'=>"VALOR_COMERCIAL","tipoVehiculo"=>"AUTO_PICKUP","valorVehiculo"=>""]]]);
			$response = json_decode(json_encode($res),true);
	    	// dd($response);
			if($response['return']['exito'] && isset($response['return']['paquetes'])){
				$paquetes = [];
				foreach ($response['return']['paquetes'] as $paquete) {
					$paquete['coberturas'] = $this->getCoberturas($response['return']['idCotizacion'], $paquete['id']);
					array_push($paquetes,$paquete);
				}
				// dd($paquetes);
				$cotizacion = ['id'=>$response['return']['idCotizacion'],'paquetes'=>$paquetes];
				return response()->json(['cotizacion'=>$cotizacion]);
				
			}
            elseif(!$response['return']['exito']){
	    	
                return response()->json(['error'=>$response['return']['mensaje']],500);
            }
            else{
                return response()->json(['error'=>"No hay paquetes"],404);
            }
    		
    	}
    	catch(SoapFault $error){
    		var_dump($error);
    	}
    }

    public function getCoberturas($cotizacion,$paquete)
    {
    	// dd($paquete);
    	$soapClient = $this->getClient($this->urlCober);
    	$coberturas = $soapClient->wsObtenerCoberturasCotizacion(['arg0'=>['token'=>$this->token,'cotizacion'=>$cotizacion,'paquete'=>$paquete]]);
    	$response = json_decode(json_encode($coberturas),true);
    	if ($response['return']['exito']){
    		return $response['return']['coberturas'];
    		// return response()->json(['coberturas'=>$response['return']['coberturas']]);
    	}
    	// dd($response);

    	// dd($soapClient->__getTypes());
    	
    }

    public function getMarcas(){
    	$client = $this->getClient($this->urlCatAuto);
    	$res = $client->wsListarMarcas(['arg0'=>["token"=>$this->token]]);
    	return $this->responseJson('marcas',$res);
    }

    public function getSubmarcas($marca_id){
    	// dd($marca_id);
    	$client = $this->getClient($this->urlCatAuto);
    	$res = $client->wsListarSubMarcas(['arg0'=>['token'=>$this->token,'idMarca'=>$marca_id]]);
    	return $this->responseJson('submarcas',$res);
    }
    public function getModelos($submarca_id)
    {
    	$client = $this->getClient($this->urlCatAuto);
    	$res = $client->wsListarModelos(['arg0'=>['idSubmarca'=>$submarca_id]]);
    	return $this->responseJson('modelos',$res);
    }
    public function getVersiones($submarca_id,$modelo)
    {
    	$client = $this->getClient($this->urlCatAuto);
    	$res = $client->wsListarVersiones(['arg0'=>['idSubmarca'=>$submarca_id,'modelo'=>$modelo]]);
    	return $this->responseJson('versiones',$res);
    }

    public function getContactos()
    {
    	$client = $this->getClient($this->urlCat);
    	$res = $client->wsListarTiposContacto(['arg0'=>['token'=>$this->token]]);
    	return $this->responseJson('tiposContacto',$res);
    }

    public function getGiros()
    {
    	$client = $this->getClient($this->urlCat);
    	$res = $client->wsListarGiros(['arg0'=>['token'=>$this->token]]);
    	return $this->responseJson('giros',$res);
    }	

    public function getEstadoCivil()
    {
    	$client = $this->getClient($this->urlCat);
    	$res = $client->wsListarEstadosCivil(['arg0'=>['token'=>$this->token]]);
    	return $this->responseJson('estadosCivil',$res);
    }

    public function getTitulos()
    {
    	$client = $this->getClient($this->urlCat);
    	$res = $client->wsListarTitulos(['arg0'=>['token'=>$this->token]]);
    	return $this->responseJson('titulos',$res);
    	
    }

    public function responseJson($key,$res)
    {
    	$response = json_decode(json_encode($res),true);
    	if($response['return']['exito']){
    		if ($key == "paquetes" && $response['return']['idCotizacion']) {
    			$value = $response['return'][$key];
    			return response()->json(['cotizacion_id'=>$response['return']['idCotizacion'],$key=>$value ]);
    		}
    		else{
    			if(array_key_exists(0,$response['return'][$key])){
    			     $value = $response['return'][$key];
    			     return response()->json([$key=>$value]);
                }
                else{
                    $value = [$response['return'][$key]];
                    return response()->json([$key=>$value]);
                }
    		}
    	}
    }
    public function sendGS(Request $request)
    {
        
        // dd($request->all());
        // dd($request->rfc);
        ini_set('default_socket_timeout', 600);
        $clientSOAP = $this->getClient($this->urlCotiza);
        $emitir = $clientSOAP->emitirCotizacion([
                'arg0'=>[
                    'token'=>$this->token,
                    'cliente'=>[
                        'cve_cli' =>0,
                        'suc_emi'=>0,
                        'fis_mor'=>$request->tipo_persona,
                        'nom_cli'=>$request->nombre,
                        'ape_pat'=>$request->apepat,
                        'ape_mat'=>$request->apemat,
                        'raz_soc'=>$request->razsoc,
                        'ane_cli'=>"",
                        'rfc_cli'=>$request->rfc,
                        'cve_ele'=>$request->elector,
                        'curpcli'=>$request->curp,
                        'sexocli'=>$request->sexo,
                        'edo_civ'=>$request->edoCivil,
                        'cal_cli'=>$request->calle,
                        'num_cli'=>$request->num,
                        'cod_pos'=>$request->cp,
                        'colonia'=>$request->colonia,
                        'municip'=>$request->municip,
                        'poblaci'=>$request->poblaci,
                        'cve_est'=>"1",
                        'fec_nac'=>$request->fnac,
                        'nac_ext'=>$request->nacionalidad,
                        'ocu_pro'=>$request->ocupacion,
                        'act_gir'=>$request->giro,
                        'telefo1'=>$request->telefono1,
                        'telefo2'=>$request->telefono2,
                        'telefo3'=>$request->telefono3,
                        'cor_ele'=>$request->email,
                        'pag_web'=>$request->web,
                        'can_con'=>$request->contacto,
                        'fue_ing'=>$request->ingresos,
                        'adm_con'=>$request->administrador,
                        'car_pub'=>$request->cargo_pub,
                        'nom_car'=>$request->nombre_cargo,
                        'per_car'=>$request->periodo_cargo,
                        'apo_cli'=>$request->apoderado,
                        'dom_ori'=>$request->domicilio_original,
                        'num_pas'=>$request->pasaporte,
                        'usu_cap'=>"",
                        'usu_aut'=>"",
                        'fec_alt'=>"",
                        'fec_act'=>"",
                        'sta_cli'=>"",
                        'descuento'=>""
                    ],
                    'datosIncisoEmision'=>[
                        'numeroMotor'=>$request->num_motor,
                        'numeroPlacas'=>$request->num_placas,
                        'numeroSerie'=>$request->num_serie
                    ],
                    'idAgenteCompartido'=>0,
                    'idCliente'=>0,
                    'idCotizacion'=>(int)$request->cotizacion_id,
                    'idFormaPago'=>(int)$request->id_pago,
                    'idPaquete'=>(int)$request->idpaquete,
                    'inicioVigencia'=>date("Y-m-d"),
                    'porcenComisionAgente2'=>""
                ]
            ]);
        $arr = json_decode(json_encode($emitir),true);
        // dd($arr);

        if($arr['return']['exito']){
            return view('generalseguros.pago',['response'=>$arr]);
            
        }
        else{
            dd($arr);
        }
        
    }



}
