<?php

namespace App\Http\Controllers;
use App\Cliente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SimpleXMLElement;
use SoapClient;
class QualitasController extends Controller
{
    //

    protected $opts,$params,$urlTarifa,$urlCotiza,$urlCotizaImpresion,$clientTarifa,$clientCotiza,$clientCotizaImpresion;

 	public function __construct(){
		$this->opts = array(
		  'ssl' => array('ciphers'=>'RC4-SHA', 'verify_peer'=>false, 'verify_peer_name'=>false),
		  'http'=> array('header'=>array("Content-Type:application/xml;charset=utf-8"))
		);
		$this->params = array ('encoding' => 'UTF-8', 'verifypeer' => false, 'verifyhost' => false, 'soap_version' => SOAP_1_1, 'trace' => 1, 'exceptions' => 1, "connection_timeout" => 180, 'stream_context' => stream_context_create($this->opts) );

		  // DATOS QUALITAS
		$this->urlTarifa = "http://qbcenter.qualitas.com.mx/wsTarifa/wsTarifa.asmx?wsdl";
		$this->urlCotiza = "http://sio.qualitas.com.mx/WsEmision/WsEmision.asmx?wsdl";
		$this->urlCotizaImpresion= "http://qbcenter.qualitas.com.mx/QBCImpresion/Service.asmx?wsdl";
		$this->clientTarifa = new SoapClient($this->urlTarifa,$this->params);
		$this->clientCotiza = new SoapClient($this->urlCotiza,$this->params);
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
	public function getModelos($uso,$marca,$modelo,$submarca,$descripcion)
	{
	  
	  try {
		$result = $this->clientTarifa->listaTarifas(['cUsuario'=>"linea",'cTarifa'=>"linea",'cMarca'=>$marca,'cTipo'=>$submarca,'version'=>$descripcion,'cModelo'=>$modelo]);
		// dd($result);
		$xml = simplexml_load_string($result->listaTarifasResult->any);
		$results = json_decode(json_encode($xml), true);
		$descripciones= [];
		// dd($results);
		if(empty($results['datos'])){
			$result=null;
			return $result;
		}
		elseif(count($results["datos"]) == 0 ){
		  array_push($descripciones, $results["datos"]['Elemento']);

		}
		else{
			
			if ($results['retorno']['descripcion'] == "1") {
				$results["datos"]['Elemento'] = [ $results["datos"]['Elemento'] ];
			}
			foreach ($results["datos"]['Elemento'] as $elemento) {
				if($uso == "Servicio Particular"){
					// dd('entra servicio particular');
					$version = explode(' ',$elemento['cVersion']);
					if(!in_array('SERVPUB',$version)){
						array_push($descripciones,$elemento);
					}
				}
				if($uso == "Servicio Público"){
					// dd('entra servicio publico');
					$version = explode(' ',$elemento['cVersion']);
					if(in_array('SERVPUB',$version)){
						array_push($descripciones,$elemento);
					}
				}

			}
		}
		$porcentajes=[];
		$porcPiv = 0;
		// dd($descripcion);
		foreach ($descripciones as $res) {
			// dd($res);
			similar_text($descripcion,$res['cVersion'],$porcentaje);
			// var_dump($porcentaje);
			if ($porcentaje >= $porcPiv ) {
				$porcPiv = $porcentaje;
				$descripcionQualitas = $res;
			} 
			array_push($porcentajes,$porcentaje);
		}
		$result = ['version'=>$descripcionQualitas];
		// dd($result);
		return $result;
		
	  } catch (SoapFault $fault) {
	  dd($fault);         
	  }
	}

	public function getCobertura(Request $request)
	{
	  // dd($request->all());
	  $cliente = Cliente::where('cotizacion',$request->cotizacion)->first();
	  if($cliente == null){
		return response()->json(['error'=>"datos no encontrado"],404);

	  }
	  else{
	  	$marca = $cliente->auto->marca->nombre;
		$submarca= $cliente->auto->submarca->nombre;
		$modelo = $cliente->auto->submarca->anio;
		$descripcion= $cliente->auto->version->descripcion;
		// dd($cliente);
		if (!$cliente->auto->version->camis_qualitas) {
			$result = $this->getModelos("Servicio Particular", $marca, $modelo, $submarca, $descripcion);
			if($result){
				$cliente->auto->version->camis_qualitas = $result['version']['CAMIS'];
				$cliente->auto->version->save();
			}
			else{
				return response()->json(['error'=>"No se encontro modelo"],404);
			}
			// dd($result['version']['CAMIS']);
		}
		$camis = $cliente->auto->version->camis_qualitas;
		$modelo = $cliente->auto->submarca->anio;
		$version = $cliente->auto->version;
		$dig =(int)$cliente->auto->version->dig;
		// dd($camis." ".$cliente->auto->version->dig);
		$fecha = Carbon::now()->toDateString();
		$fecha_t = Carbon::parse($fecha);
		$fecha_t = $fecha_t->addYears(1)->toDateString();
		// $dig_ver = $cliente->dig;
		// dd($dig_ver);
		// var_dump($camis);
		// var_dump(strlen($camis));
	   //  $sum_impar = 0;
	   // if(strlen($camis) <5){
	   //      $camis = str_pad($camis,5,'0',STR_PAD_LEFT);
	   //  }
	   //  for($i=0;$i<strlen($camis);$i++){
	   //      if (($i+1)%2 != 0) {
	   //        // var_dump($camis[$i]);
	   //          // var_dump($i);
	   //          $sum_impar += $camis[$i];
	   //      }
	   //  }
	   //  var_dump($sum_impar);
	   //  $sum_impar = $sum_impar*3;
	   //  $sum_impar = (string)$sum_impar; 
	   //  $sum_par = 0;
	   //  for ($i = 0; $i < strlen($sum_impar); $i++) {
	   //    $sum_par += $sum_impar[$i];
	   //  }
	   //  var_dump($sum_impar);
	   //  var_dump($sum_par);
	   //  $et4 = $sum_impar+$sum_par;
	   //  var_dump($et4);
	   //  $et5 = $et4%10;
	   //  if($et5 != 0){
	   //    $digito = 10-$et5;
	   //  }
	   //  dd($digito);

		 $xmlA =<<<XML
  <Movimientos>
	<Movimiento TipoMovimiento="2" NoPoliza="" NoCotizacion="" NoEndoso="" TipoEndoso="" NoOTra="" NoNegocio="05545">
	  <DatosAsegurado NoAsegurado="">
		<Nombre/>
		<Direccion/>
		<Colonia/>
		<Poblacion/>
		<Estado>$cliente->cestado</Estado>
		<CodigoPostal>$cliente->cp</CodigoPostal>
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
		  <ValorRegla>$cliente->nombre</ValorRegla>
		</ConsideracionesAdicionalesDA>
		<ConsideracionesAdicionalesDA NoConsideracion="40">
		  <TipoRegla>5</TipoRegla>
		  <ValorRegla>$cliente->appaterno</ValorRegla>
		</ConsideracionesAdicionalesDA>
		<ConsideracionesAdicionalesDA NoConsideracion="40">
		  <TipoRegla>6</TipoRegla>
		  <ValorRegla>$cliente->apmaterno</ValorRegla>
		</ConsideracionesAdicionalesDA>
	  </DatosAsegurado>
	  <DatosVehiculo NoInciso="1">
		<ClaveAmis>$camis</ClaveAmis>
		<Modelo>$modelo</Modelo>
		<DescripcionVehiculo></DescripcionVehiculo>
		<Uso>$cliente->uso</Uso>
		<Servicio>$cliente->servicio</Servicio>
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
		<Coberturas NoCobertura="13">
			<SumaAsegurada>0</SumaAsegurada>
			<TipoSuma>0</TipoSuma>
			<Deducible>1500</Deducible>
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
		<FechaEmision>$fecha</FechaEmision>
		<FechaInicio>$fecha</FechaInicio>
		<FechaTermino>$fecha_t</FechaTermino>
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
		  <ValorRegla>$dig</ValorRegla>
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
  		$xmlL =<<<XML
  <Movimientos>
	<Movimiento TipoMovimiento="2" NoPoliza="" NoCotizacion="" NoEndoso="" TipoEndoso="" NoOTra="" NoNegocio="05545">
	  <DatosAsegurado NoAsegurado="">
		<Nombre/>
		<Direccion/>
		<Colonia/>
		<Poblacion/>
		<Estado>9</Estado>
		<CodigoPostal>$cliente->cp</CodigoPostal>
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
		  <ValorRegla>$cliente->nombre</ValorRegla>
		</ConsideracionesAdicionalesDA>
		<ConsideracionesAdicionalesDA NoConsideracion="40">
		  <TipoRegla>5</TipoRegla>
		  <ValorRegla>$cliente->appaterno</ValorRegla>
		</ConsideracionesAdicionalesDA>
		<ConsideracionesAdicionalesDA NoConsideracion="40">
		  <TipoRegla>6</TipoRegla>
		  <ValorRegla>$cliente->apmaterno</ValorRegla>
		</ConsideracionesAdicionalesDA>
	  </DatosAsegurado>
	  <DatosVehiculo NoInciso="1">
		<ClaveAmis>$camis</ClaveAmis>
		<Modelo>$modelo</Modelo>
		<DescripcionVehiculo></DescripcionVehiculo>
		<Uso>1</Uso>
		<Servicio>1</Servicio>
		<Paquete>3</Paquete>
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
		<FechaEmision>$fecha</FechaEmision>
		<FechaInicio>$fecha</FechaInicio>
		<FechaTermino>$fecha_t</FechaTermino>
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
		  <ValorRegla>$dig</ValorRegla>
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
  		$xmlRC =<<<XML
  <Movimientos>
	<Movimiento TipoMovimiento="2" NoPoliza="" NoCotizacion="" NoEndoso="" TipoEndoso="" NoOTra="" NoNegocio="05545">
	  <DatosAsegurado NoAsegurado="">
		<Nombre/>
		<Direccion/>
		<Colonia/>
		<Poblacion/>
		<Estado>9</Estado>
		<CodigoPostal>$cliente->cp</CodigoPostal>
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
		  <ValorRegla>$cliente->nombre</ValorRegla>
		</ConsideracionesAdicionalesDA>
		<ConsideracionesAdicionalesDA NoConsideracion="40">
		  <TipoRegla>5</TipoRegla>
		  <ValorRegla>$cliente->appaterno</ValorRegla>
		</ConsideracionesAdicionalesDA>
		<ConsideracionesAdicionalesDA NoConsideracion="40">
		  <TipoRegla>6</TipoRegla>
		  <ValorRegla>$cliente->apmaterno</ValorRegla>
		</ConsideracionesAdicionalesDA>
	  </DatosAsegurado>
	  <DatosVehiculo NoInciso="1">
		<ClaveAmis>$camis</ClaveAmis>
		<Modelo>$modelo</Modelo>
		<DescripcionVehiculo></DescripcionVehiculo>
		<Uso>1</Uso>
		<Servicio>1</Servicio>
		<Paquete>4</Paquete>
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
		<FechaEmision>$fecha</FechaEmision>
		<FechaInicio>$fecha</FechaInicio>
		<FechaTermino>$fecha_t</FechaTermino>
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
		  <ValorRegla>$dig</ValorRegla>
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
		// dd($xmlA);
		$amplia = $this->getQualitas($xmlA);
		$limitada = $this->getQualitas($xmlL);
		$rc = $this->getQualitas($xmlRC);
		return response()->json(['amplia'=>$amplia,'limitada'=>$limitada,'rc'=>$rc]);

		
		
		

	 	}

	  // $request->cotizacion
	}

	public function getQualitas($xml){
		$client = $this->clientCotiza->obtenerNuevaEmision(array('xmlEmision'=>$xml));
		$xmlR = simplexml_load_string($client->obtenerNuevaEmisionResult);
		$response = json_decode(json_encode($xmlR), true);
		

		if($response['Movimiento']['CodigoError']){
			$error = ['error'=>$response['Movimiento']['CodigoError']];
			$cobertura = [
		  		'Nombre'=>"Qualitas",
				'error'=>$error
		  	];
		  	return $cobertura;
		}
		else{
			$coberturas=[];
		  	foreach ($response['Movimiento']['DatosVehiculo']['Coberturas'] as $cobertura) {
				switch($cobertura["@attributes"]["NoCobertura"]){
					case "1":
						$cobertura['tipo'] = "Daños Materiales";
						break;
					case "2":
						$cobertura['tipo'] = "Perdida Total";
						break;
					case "3":
						$cobertura['tipo'] = "Robo Total";
						break;
					case "4":
						$cobertura['tipo'] = "Responsabilidad Civil";
						break;
					case "5":
						$cobertura['tipo'] = "Gastos Médicos";
						break;
					case "6":
						$cobertura['tipo'] = "Muerte del conductor";
						break;
					case "7":
						$cobertura['tipo'] = "Gastos Legales";
						break;
					case "8":
						$cobertura['tipo'] = "Equipo Especial";
						break;
					case "9":
						$cobertura['tipo'] = "Adaptaciones Daños Materiales";
						break;
					case "10":
						$cobertura['tipo'] = "Adaptaciones Robo Total";
						break;
					case "11":
						$cobertura['tipo'] = "Extensión de Responsabilidad Civil";
						break;
					case "12":
						$cobertura['tipo'] = "Exención de Deducible";
						break;
					case "13":
						$cobertura['tipo'] = "Responsabilidad Civil Pasajero";
						break;
					case "14":
						$cobertura['tipo'] = "Asistencia Vial";
						break;
					case "15":
						$cobertura['tipo'] = "Robo Parcial";
						break;
					case "16":
						$cobertura['tipo'] = "Ajuste Automático";
						break;
					case "17":
						$cobertura['tipo'] = "Gastos de Transporte";
						break;
					case "18":
						$cobertura['tipo'] = "Responsabilidad Civil Personas";
						break;
					case "19":
						$cobertura['tipo'] = "Responsabilidad Civil Bienes";
						break;
					case "20":
						$cobertura['tipo'] = "Responsabilidad Civil Catastrófica";
						break;
					case "21":
						$cobertura['tipo'] = "Responsabilidad Civil Ecológica";
						break;
					case "22":
						$cobertura['tipo'] = "Responsabilidad Civil Legal";
						break;
					case "23":
						$cobertura['tipo'] = "CIVA DM";
						break;
					case "24":
						$cobertura['tipo'] = "CIVA RT";
						break;
					case "25":
						$cobertura['tipo'] = "Asistencia Satelital";
						break;
					case "26":
						$cobertura['tipo'] = "EDV";
						break;
					case "27":
						$cobertura['tipo'] = "AVC";
						break;
					case "28":
						$cobertura['tipo'] = "GTP";
						break;
					case "29":
						$cobertura['tipo'] = "PEUG EG";
						break;
					case "30":
						$cobertura['tipo'] = "PEUG SM";
						break;
					case "31":
						$cobertura['tipo'] = "Daños por la carga";
						break;
					case "32":
						$cobertura['tipo'] = "ADAP SPT";
						break;
					case "33":
						$cobertura['tipo'] = "Exención de deducible por prima nivelada.";
						break;
					case "50":
						$cobertura['tipo'] = "Extensión de garantía";
						break;
					case "51":
						$cobertura['tipo'] = "Servicios de asistencia";
						break;
					case "52":
						$cobertura['tipo'] = "Carnét de Mantenimiento";
						break;
				}
				array_push($coberturas, $cobertura);
				
		  	}
		  	  	$cobertura = [
		  		'Nombre'=>"Qualitas",
				'Primas'=>$response['Movimiento']['Primas'],
				'Coberturas'=>$coberturas
		  	];
		  	return $cobertura;
		}
	  }
}
