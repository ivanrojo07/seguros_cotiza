<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use SimpleXMLElement;

class WebServiceController extends Controller
{
    //
    protected $opts,$params,$opts1,$params1,$urlTarifa,$clientTarifa,$clientCotiza,$clientCotizaImpresion;

    public function __construct(){
    	$this->opts = array(
        	'ssl' => array('ciphers'=>'RC4-SHA', 'verify_peer'=>false, 'verify_peer_name'=>false),
        	'http'=> array('header'=>array('Content-Type:application/soap+xml; charset=utf-8'))
		);
    	$this->params = array ('encoding' => 'UTF-8', 'verifypeer' => false, 'verifyhost' => false, 'soap_version' => SOAP_1_2, 'trace' => 1, 'exceptions' => 1, "connection_timeout" => 180, 'stream_context' => stream_context_create($this->opts) );
    	$this->opts1=['http'=>['header'=>["Content-Type:text/xml;charset=utf-8"]]];
    	$this->params1=array ( 'encoding' => 'UTF-8','soap_version' => SOAP_1_2, 'trace' => 1, 'stream_context' => stream_context_create($this->opts1) );
    		// 'soap_version'=> SOAP_1_1,
   		$this->urlTarifa = "http://qbcenter.qualitas.com.mx/wsTarifa/wsTarifa.asmx?wsdl";
   		$this->urlCotiza = "http://sio.qualitas.com.mx/WsEmision/WsEmision.asmx?wsdl";
   		$this->urlCotizaImpresion= "http://qbcenter.qualitas.com.mx/QBCImpresion/Service.asmx?wsdl";
   		$this->clientTarifa = new SoapClient($this->urlTarifa,$this->params);
   		$this->clientCotiza = new SoapClient($this->urlCotiza,$this->params1);
   		$this->clientCotizaImpresion= new SoapClient($this->urlCotizaImpresion,$this->params);
    }


   	public function getMarcas()
   	{
   		
   		try {
   			
   			
   			// dd($client->__getTypes());
   			$lista_marcas = $this->clientTarifa->listaMarcas(['cUsuario'=>"linea","cTarifa"=>"linea"]);
   			// dd($this->clientTarifa->__getLastRequest());
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
   			$result = $this->clientTarifa->listaTarifas(['cUsuario'=>"linea",'cTarifa'=>"linea",'cMarca'=>$marca,'cModelo'=>$modelo]);
   			$xml = simplexml_load_string($result->listaTarifasResult->any);
   			$response = json_decode(json_encode($xml), true);
   			// dd($response);

   			if(count($response["datos"]) == 0){
   				return response()->json(["message"=>"no se encotraron descripciones"],404);
   			}
   			else{
   			$descripcion = $response["datos"]['Elemento'];
   				return response()->json(["descripcion"=>$descripcion],201);
   			}
   			
   		} catch (SoapFault $fault) {
			dd($fault);   			
   		}

   	}
   	public function getTarifas(Request $request)
   	{
   		try {
   			// dd($this->clientCotiza->__getLastResponse());
        // $params =array('Movimientos'=>array('Movimiento TipoMovimiento="3"'=>array('DatosAsegurado'=>array('Nombre'=>"Rojo Orea Guillermo Iván",'Direccion'=>"Norte 58-A",'Colonia'=>"Martires de Rio Blanco"))));
        $xmlstr =<<<XML
<?xml version="1.0" encoding="utf-8"?>
  <Movimientos>
    <Movimiento TipoMovimiento="2">
      <DatosAsegurado NoAsegurado="">
        <Nombre>ApellidoPat ApellidoMat Nombre1 Nombre2</Nombre>
        <Direccion>Calle</Direccion>
        <Colonia>Colonia</Colonia>
        <Poblacion>Municipio</Poblacion>
        <Estado>25</Estado>
        <CodigoPostal>12345</CodigoPostal>
        <NoEmpleado/>
        <Agrupador/>
        <?asegurado persona fisica?>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>1</TipoRegla>
          <ValorRegla>No Exterior</ValorRegla>
        </ConsideracionesAdicionalesDA>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>2</TipoRegla>
          <ValorRegla>No Interior</ValorRegla>
        </ConsideracionesAdicionalesDA>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>3</TipoRegla>
          <ValorRegla>Pais</ValorRegla>
        </ConsideracionesAdicionalesDA>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>4</TipoRegla>
          <ValorRegla>Nombre1 Nombre2</ValorRegla>
        </ConsideracionesAdicionalesDA>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>5</TipoRegla>
          <ValorRegla>ApellidoPat</ValorRegla>
        </ConsideracionesAdicionalesDA>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>6</TipoRegla>
          <ValorRegla>ApellidoMat</ValorRegla>
        </ConsideracionesAdicionalesDA>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>7</TipoRegla>
          <ValorRegla></ValorRegla>
        </ConsideracionesAdicionalesDA>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>8</TipoRegla>
          <ValorRegla>07880</ValorRegla>
        </ConsideracionesAdicionalesDA>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>19</TipoRegla>
          <ValorRegla>Fisica</ValorRegla>
        </ConsideracionesAdicionalesDA>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>20</TipoRegla>
          <ValorRegla>21101992</ValorRegla>
        </ConsideracionesAdicionalesDA>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>21</TipoRegla>
          <ValorRegla></ValorRegla>
        </ConsideracionesAdicionalesDA>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>22</TipoRegla>
          <ValorRegla></ValorRegla>
        </ConsideracionesAdicionalesDA>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>23</TipoRegla>
          <ValorRegla>Programador</ValorRegla>
        </ConsideracionesAdicionalesDA>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>24</TipoRegla>
          <ValorRegla>Publico</ValorRegla>
        </ConsideracionesAdicionalesDA>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>25</TipoRegla>
          <ValorRegla>Programador</ValorRegla>
        </ConsideracionesAdicionalesDA>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>26</TipoRegla>
          <ValorRegla></ValorRegla>
        </ConsideracionesAdicionalesDA>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>27</TipoRegla>
          <ValorRegla></ValorRegla>
        </ConsideracionesAdicionalesDA>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>28</TipoRegla>
          <ValorRegla></ValorRegla>
        </ConsideracionesAdicionalesDA>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>29</TipoRegla>
          <ValorRegla></ValorRegla>
        </ConsideracionesAdicionalesDA>
        <ConsideracionesAdicionalesDA NoConsideracion="40">
          <TipoRegla>30</TipoRegla>
          <ValorRegla>55555555</ValorRegla>
        </ConsideracionesAdicionalesDA>
      </DatosAsegurado>
      <DatosVehiculo NoInciso="1">
        <ClaveAmis>05818</ClaveAmis>
        <Modelo>2009</Modelo>
        <DescripcionVehiculo/>
        <Uso>1</Uso>
        <Servicio>1</Servicio>
        <Paquete>1</Paquete>
        <Motor>Motor</Motor>
        <Serie>Serie</Serie>
        <Coberturas NoCobertura="01">
          <SumaAsegurada>350000</SumaAsegurada>
          <TipoSuma>1</TipoSuma>
          <Deducible>5</Deducible>
          <Prima>0</Prima>
        </Coberturas>
        <Coberturas NoCobertura="03">
          <SumaAsegurada>350000</SumaAsegurada>
          <TipoSuma>1</TipoSuma>
          <Deducible>10</Deducible>
          <Prima>0</Prima>
        </Coberturas>
        <Coberturas NoCobertura="04">
          <SumaAsegurada>1000000</SumaAsegurada>
          <TipoSuma>1</TipoSuma>
          <Deducible/>
          <Prima>0</Prima>
        </Coberturas>
        <Coberturas NoCobertura="05">
          <SumaAsegurada>250000</SumaAsegurada>
          <TipoSuma>0</TipoSuma>
          <Deducible>0</Deducible>
          <Prima>0</Prima>
        </Coberturas>
      </DatosVehiculo>
      <DatosGenerales>
        <FechaEmision>2018-10-21</FechaEmision>
        <FechaInicio>2018-10-21</FechaInicio>
        <FechaTermino>2018-10-21</FechaTermino>
        <Moneda>00</Moneda>
        <Agente>#####</Agente>
        <FormaPago>C</FormaPago>
        <TarifaValores>####</TarifaValores>
        <TarifaCuotas>####</TarifaCuotas>
        <TarifaDerechos>####</TarifaDerechos>
        <Plazo/>
        <Agencia/>
        <Contrato/>
        <PorcentajeDescuento>5</PorcentajeDescuento>
        <ConsideracionesAdicionalesDG NoConsideracion="1">
          <TipoRegla>1</TipoRegla>
          <ValorRegla>Dígito Verificador: 6</ValorRegla>
        </ConsideracionesAdicionalesDG>
        <ConsideracionesAdicionalesDG NoConsideracion="4">
          <TipoRegla>1</TipoRegla>
          <ValorRegla>Ambiente: 1</ValorRegla>
        </ConsideracionesAdicionalesDG>
        <ConsideracionesAdicionalesDG NoConsideracion="14">
          <TipoRegla>1</TipoRegla>
          <ValorRegla>Zonificación: A19397090200</ValorRegla>
        </ConsideracionesAdicionalesDG>
      </DatosGenerales>
      <Primas>
        <PrimaNeta/>
        <Derecho>340</Derecho>
        <Recargo/>
        <Impuesto/>
        <PrimaTotal/>
        <Comision/>
      </Primas>
      <CodigoError/>
    </Movimiento>
  </Movimientos>
XML;
        // $xml = simplexml_load_file($xmlstr);
        // dd($xmlstr);
        // var_dump($this->clientCotiza->__getFunctions());  
        var_dump($this->clientCotiza->__getLastResponse());	
        var_dump($this->clientCotiza->obtenerNuevaEmision(array('xmlEmision'=>$xmlstr)));
   		} catch (SoapFault $fault) {
   			trigger_error("SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})", E_USER_ERROR);
   		}

   	}
}
