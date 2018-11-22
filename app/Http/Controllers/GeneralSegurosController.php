<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;


class GeneralSegurosController extends Controller
{
    //

    protected $opts,$params,$urlAuth,$urlCotiza,$token,$urlCat,$urlCatAuto,$urlCober;

    public function __construct(){

    	$this->opts = array(
		  'ssl' => array('ciphers'=>'RC4-SHA', 'verify_peer'=>false, 'verify_peer_name'=>false),
		  'http'=> array('header'=>array('Content-Type:application/soap+xml; charset=utf-8'), 'user_agent' => 'PHPSoapClient')
		);
		$this->params = array ('encoding' => 'UTF-8', 'verifypeer' => false, 'verifyhost' => false, 'soap_version' => SOAP_1_1, 'trace' => 1, 'exceptions' => 1, "connection_timeout" => 180, 'stream_context' => stream_context_create($this->opts) );
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

    public function getCoberturas(){
    	var_dump($this->token);
    }

    public function getMarcas(){
    	$client = $this->getClient($this->urlCatAuto);
    	dd($client->wsListarMarcas(['arg0'=>["token"=>$this->token]]));
    }


}
