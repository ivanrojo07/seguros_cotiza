<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use SimpleXMLElement;

class WebServiceController extends Controller
{
    //
    protected $opts,$params,$urlTarifa,$client;

    public function __construct(){
    	$this->opts = array(
        	'ssl' => array('ciphers'=>'RC4-SHA', 'verify_peer'=>false, 'verify_peer_name'=>false)
		);
    	$this->params = array ('encoding' => 'UTF-8', 'verifypeer' => false, 'verifyhost' => false, 'soap_version' => SOAP_1_2, 'trace' => 1, 'exceptions' => 1, "connection_timeout" => 180, 'stream_context' => stream_context_create($this->opts) );
   		$this->urlTarifa = "http://qbcenter.qualitas.com.mx/wsTarifa/wsTarifa.asmx?wsdl";
   		$this->client = new SoapClient($this->urlTarifa,$this->params);
    }


   	public function getMarcas()
   	{
   		
   		try {
   			
   			
   			// dd($client->__getTypes());
   			$lista_marcas = $this->client->listaMarcas(['cUsuario'=>"linea","cTarifa"=>"linea"]);
   			
   			$xml = simplexml_load_string($lista_marcas->listaMarcasResult->any);
   			$response = json_decode(json_encode($xml), true);
	        $marcas = $response["datos"]['Elemento'];
	        // dd($marcas);
	        return response()->json(["marcas"=>$marcas],201);
   		} catch (SoapFault $fault) {
   			
   			dd($fault);

   		}
   	}

   	public function getModelos($marca,$modelo)
   	{
   		// dd($marca);
   		try {
   			$result = $this->client->listaTarifas(['cUsuario'=>"linea",'cTarifa'=>"linea",'cMarca'=>$marca,'cModelo'=>$modelo]);
   			$xml = simplexml_load_string($result->listaTarifasResult->any);
   			$response = json_decode(json_encode($xml), true);
   			dd($response);
   			
   		} catch (SoapFault $fault) {
			dd($fault);   			
   		}

   	}
}
