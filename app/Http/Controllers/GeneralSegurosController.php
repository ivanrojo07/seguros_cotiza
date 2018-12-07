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
		  'ssl' => array('ciphers'=>'RC4-SHA', 'verify_peer'=>false, 'verify_peer_name'=>false),
		  'http'=> array('header'=>array('Content-Type:application/soap+xml; charset=utf-8'))
		);
		$this->params = array ('encoding' => 'UTF-8', 'verifypeer' => false, 'verifyhost' => false, 'soap_version' => SOAP_1_1, 'trace' => 1, 'exceptions' => 1, "connection_timeout" => 500,'keep_alive' => 0, 'cache_wsdl' => WSDL_CACHE_NONE, 'stream_context' => stream_context_create($this->opts) );
    	 // DATOS GENERAL DE SEGUROS
		$this->urlAuth = "http://gdswas.mx:9080/gsautos-wsDesa/soap/autenticacionWS?wsdl";
		$this->urlCotiza = "http://gdswas.mx:9080/gsautos-wsDesa/soap/cotizacionEmisionWS?wsdl";
		$this->urlCat = "http://gdswas.mx:9080/gsautos-wsDesa/soap/catalogosWS?wsdl";
		$this->urlCatAuto = "http://gdswas.mx:9080/gsautos-wsDesa/soap/catalogoAutosWS?wsdl";
		$this->urlCober = "http://gdswas.mx:9080/gsautos-wsDesa/soap/catalogoCoberturasWS?wsdl";
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
    	return new SoapClient($url,$this->params);
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
    			
    			$value = $response['return'][$key];
    			return response()->json([$key=>$value]);
    		}
    	}
    }

    public function emitir(){
        $cliente = Cliente::find(2);
        $clientSOAP = $this->getClient($this->urlCotiza);
        // dd($clientSOAP->__getTypes());
        $emitir = $clientSOAP->emitirCotizacion([
            'arg0'=>[
                'token'=>$this->token,
                'cliente'=>[
                    'cve_cli' =>0,
                    'suc_emi'=>0,
                    'fis_mor'=>"F",
                    'nom_cli'=>$cliente->nombre,
                    'ape_pat'=>$cliente->appaterno,
                    'ape_mat'=>$cliente->apmaterno,
                    'raz_soc'=>"",
                    'ane_cli'=>"",
                    'rfc_cli'=>"ROOG921021IS2",
                    'cve_ele'=>"",
                    'curpcli'=>"ROOG921021HDFJRL01",
                    'sexocli'=>1,
                    'edo_civ'=>1,
                    'cal_cli'=>"Norte 58-A",
                    'num_cli'=>"3468",
                    'cod_pos'=>$cliente->cp,
                    'colonia'=>"Martires de Río Blanco",
                    'municip'=>"Gustavo A. Madero",
                    'poblaci'=>"Gustavo A. Madero",
                    'cve_est'=>"1",
                    'fec_nac'=>$cliente->f_nac,
                    'nac_ext'=>1,
                    'ocu_pro'=>185,
                    'act_gir'=>165,
                    'telefo1'=>$cliente->telefono,
                    'telefo2'=>"",
                    'telefo3'=>"",
                    'cor_ele'=>$cliente->email,
                    'pag_web'=>"",
                    'can_con'=>4,
                    'fue_ing'=>"trabajo",
                    'adm_con'=>"",
                    'car_pub'=>"N",
                    'nom_car'=>"",
                    'per_car'=>"",
                    'apo_cli'=>"N",
                    'dom_ori'=>"",
                    'num_pas'=>"",
                    'usu_cap'=>"",
                    'usu_aut'=>"",
                    'fec_alt'=>"",
                    'fec_act'=>"",
                    'sta_cli'=>"",
                    'descuento'=>""
                ],
                'datosIncisoEmision'=>[
                    'numeroMotor'=>"123465789",
                    'numeroPlacas'=>"123adsf",
                    'numeroSerie'=>"a12s3s3543a3g34a3a4g"
                ],
                'idAgenteCompartido'=>0,
                'idCliente'=>0,
                'idCotizacion'=>896029,
                'idFormaPago'=>4,
                'idPaquete'=>2,
                'inicioVigencia'=>'2018-12-04',
                'porcenComisionAgente2'=>""
            ]
        ]);
        dd($emitir);
        dd($cliente);
    }



}
