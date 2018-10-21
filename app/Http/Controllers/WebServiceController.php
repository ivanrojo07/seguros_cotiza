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
      $this->params = array ('encoding' => 'UTF-8', 'verifypeer' => false, 'verifyhost' => false, 'soap_version' => SOAP_1_1, 'trace' => 1, 'exceptions' => 1, "connection_timeout" => 180, 'stream_context' => stream_context_create($this->opts) );
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
        
        
        // dd($this->clientTarifa->__getTypes());
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
        $xmlstr =<<<XML
<Movimientos>
  <Movimiento TipoMovimiento="2" NoPoliza="" NoCotizacion="" NoEndoso="" TipoEndoso="" NoOTra="" NoNegocio="05545">
    <DatosAsegurado NoAsegurado="">
      <Nombre/>
      <Direccion/>
      <Colonia/>
      <Poblacion/>
      <Estado>9</Estado>
      <CodigoPostal>06000</CodigoPostal>
      <NoEmpleado/>
      <Agrupador/>
      <ConsideracionesAdicionalesDA NoConsideracion="40">
        <TipoRegla>1</TipoRegla>
        <ValorRegla>1</ValorRegla>
      </ConsideracionesAdicionalesDA>
      <ConsideracionesAdicionalesDA NoConsideracion="40">
        <TipoRegla>2</TipoRegla>
        <ValorRegla>2</ValorRegla>
      </ConsideracionesAdicionalesDA>
      <ConsideracionesAdicionalesDA NoConsideracion="40">
        <TipoRegla>3</TipoRegla>
        <ValorRegla>MEXICO</ValorRegla>
      </ConsideracionesAdicionalesDA>
      <ConsideracionesAdicionalesDA NoConsideracion="40">
        <TipoRegla>4</TipoRegla>
        <ValorRegla>NOMBRE2</ValorRegla>
      </ConsideracionesAdicionalesDA>
      <ConsideracionesAdicionalesDA NoConsideracion="40">
        <TipoRegla>5</TipoRegla>
        <ValorRegla>APELLIDOP2</ValorRegla>
      </ConsideracionesAdicionalesDA>
      <ConsideracionesAdicionalesDA NoConsideracion="40">
        <TipoRegla>6</TipoRegla>
        <ValorRegla>APELLIDOM2</ValorRegla>
      </ConsideracionesAdicionalesDA>
    </DatosAsegurado>
    <DatosVehiculo NoInciso="1">
      <ClaveAmis>2789</ClaveAmis>
      <Modelo>2018</Modelo>
      <DescripcionVehiculo/>
      <Uso>1</Uso>
      <Servicio>1</Servicio>
      <Paquete>1</Paquete>
      <Motor/>
      <Serie/>
      <Coberturas NoCobertura="1">
        <SumaAsegurada>0</SumaAsegurada>
        <TipoSuma>0</TipoSuma>
        <Deducible>5</Deducible>
        <Prima>0</Prima>
      </Coberturas>
      <Coberturas NoCobertura="3">
        <SumaAsegurada>0</SumaAsegurada>
        <TipoSuma>0</TipoSuma>
        <Deducible>10</Deducible>
        <Prima>0</Prima>
      </Coberturas>
      <Coberturas NoCobertura="4">
        <SumaAsegurada>2000000</SumaAsegurada>
        <TipoSuma>0</TipoSuma>
        <Deducible>0</Deducible>
        <Prima>0</Prima>
      </Coberturas>
      <Coberturas NoCobertura="5">
        <SumaAsegurada>250000</SumaAsegurada>
        <TipoSuma>0</TipoSuma>
        <Deducible>0</Deducible>
        <Prima>0</Prima>
      </Coberturas>
      <Coberturas NoCobertura="7">
        <SumaAsegurada/>
        <TipoSuma>0</TipoSuma>
        <Deducible>0</Deducible>
        <Prima>0</Prima>
      </Coberturas>
      <Coberturas NoCobertura="6">
        <SumaAsegurada>100000</SumaAsegurada>
        <TipoSuma>0</TipoSuma>
        <Deducible>0</Deducible>
        <Prima>0</Prima>
      </Coberturas>
      <Coberturas NoCobertura="14">
        <SumaAsegurada>90</SumaAsegurada>
        <TipoSuma>0</TipoSuma>
        <Deducible>0</Deducible>
        <Prima>0</Prima>
      </Coberturas>
      <Coberturas NoCobertura="47">
        <SumaAsegurada>1000000</SumaAsegurada>
        <TipoSuma>14</TipoSuma>
        <Deducible>0</Deducible>
        <Prima>0</Prima>
      </Coberturas>
    </DatosVehiculo>
    <DatosGenerales>
      <FechaEmision>2018-10-19</FechaEmision>
      <FechaInicio>2018-10-19</FechaInicio>
      <FechaTermino>2019-10-19</FechaTermino>
      <Moneda>0</Moneda>
      <Agente>74285</Agente>
      <FormaPago>C</FormaPago>
      <TarifaValores>LINEA</TarifaValores>
      <TarifaCuotas>LINEA</TarifaCuotas>
      <TarifaDerechos>LINEA</TarifaDerechos>
      <Plazo/>
      <Agencia/>
      <Contrato/>
      <PorcentajeDescuento>20</PorcentajeDescuento>
      <ConsideracionesAdicionalesDG NoConsideracion="1">
        <TipoRegla>1</TipoRegla>
        <ValorRegla>2</ValorRegla>
      </ConsideracionesAdicionalesDG>
      <ConsideracionesAdicionalesDG NoConsideracion="4">
        <TipoRegla>1</TipoRegla>
        <ValorRegla>1</ValorRegla>
      </ConsideracionesAdicionalesDG>
    </DatosGenerales>
    <Primas>
      <PrimaNeta/>
      <Derecho>500</Derecho>
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
        $client = $this->clientCotiza->obtenerNuevaEmision(array('xmlEmision'=>$xmlstr));
        $xml = simplexml_load_string($client->obtenerNuevaEmisionResult);
        $response = json_decode(json_encode($xml), true);
        dd($response);
        // dd($this->clientCotiza->__getLastResponse()); 
      } catch (SoapFault $fault) {
        trigger_error("SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})", E_USER_ERROR);
      }
    }
}