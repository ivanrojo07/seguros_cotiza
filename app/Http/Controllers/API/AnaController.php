<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SoapClient;

class AnaController extends Controller
{

    protected $opts,$params,$url,$urlPHP,$cliente;

    public function __construct()
    {
        $this->opts=array(
            'http'=>array(
                'header'=>'Content-Type:application/xml;charset=utf-8',
                'user_agent' => 'PHPSoapClient'
            )
        );
        $this->params = array(
            'encoding'=>'UTF-8',
            'verifypeer'=>false,
            'verifyhost'=>false,
            'soap_version'=>SOAP_1_2,
            'trace'=>1,
            'exceptions'=>1,
            'connection_timeout'=>5000,
            'stream_context'=>stream_context_create($this->opts)
        );
        $this->url="https://server.anaseguros.com.mx/ananetws/service.asmx?wsdl";
        $this->urlPHP ="https://server.anaseguros.com.mx/ananetws/servicetext.asmx?wsdl";
    }

    protected function convertXMLtoArray($xmlelements)
    {
        $array = [];
        foreach ($xmlelements as $value) {
            $object = json_decode(json_encode($value),true);
            array_push($array,['id'=>$object['@attributes']['id'],'descripcion'=>$object[0]]);
        }
        return $array;
    }

    public function prueba()
    {
        try{
            $client = new SoapClient($this->url,$this->params);
            dd($client->__getTypes());
        }
        catch(SoapFault $fault){
            dd($fault);
        }
        
    }

    public function bancos(){
        try{
            $client = new SoapClient($this->url,$this->params);
            $bancosXML = $client->Bancos(["Negocio"=>"1195","Usuario"=>"14275","Clave"=>"kdEDyC9F"]);
            $bancos= $this->convertXMLtoArray(simplexml_load_string($bancosXML->BancosResult)->bancos);
            if (isset($bancos)) {
                // $bancos = $bancosResp['bancos'];
                return response()->json(['bancos'=>$bancos],201);
            }
            else{
                return response()->json(['error'=>"Bancos no encontrados",404]);
            }
        }catch(SoapFault $fault){
            dd($fault);
        }
    }

    public function categorias()
    {
        try{
            $client = new SoapClient($this->url,$this->params);
            $categoriasXML = $client->Categoria(["Negocio"=>"1195","Usuario"=>"14275","Clave"=>"kdEDyC9F"]);
            dd(simplexml_load_string($categoriasXML->CategoriaResult));
            // if (isset($categoriasResp['categorias'])) {
            //     $categorias = $categoriasResp['categorias'];
            //     return response()->json(['categorias'=>$categorias],201);
            // }
            // else{
            //     return response()->json(['error'=>"Categorias no encontradas",404]);
            // }
        }catch(SoapFault $fault){
            dd($fault);
        }
    }
    public function codigoPostales($estado,$ciudad)
    {
        try{
            $client = new SoapClient($this->url,$this->params);
            $codigoPostalXML = $client->CodigoPostal(["Estado"=>$estado,"Ciudad"=>$ciudad,"Negocio"=>"1195","Usuario"=>"14275","Clave"=>"kdEDyC9F"]);
            // dd(simplexml_load_string($codigoPostalXML->CodigoPostalResult)->cp);
            $codigoPostal= $this->convertXMLtoArray(simplexml_load_string($codigoPostalXML->CodigoPostalResult)->cp);
            if (isset($codigoPostal)) {
                return response()->json(['Codigo Postal'=>$codigoPostal],201);
            }
            else{
                return response()->json(['error'=>"Codigo Postales no encontrados",404]);
            }
        }catch(SoapFault $fault){
            dd($fault);
        }
    }
    public function colonias($estado,$ciudad,$cp)
    {
        try{
            $client = new SoapClient($this->url,$this->params);
            $coloniaXML = $client->Colonia(["Estado"=>$estado,"Ciudad"=>$ciudad,"CP"=>$cp,"Negocio"=>"1195","Usuario"=>"14275","Clave"=>"kdEDyC9F"]);
            // dd(simplexml_load_string($coloniaXML->ColoniaResult)->colonia);
            $colonias=$this->convertXMLtoArray(simplexml_load_string($coloniaXML->ColoniaResult)->colonia);
            if (isset($colonias)) {
                return response()->json(['colonias'=>$colonias],201);
            }
            else{
                return response()->json(['error'=>"Colonias no encontradas",404]);
            }
        }catch(SoapFault $fault){
            dd($fault);
        }
    }
    public function colores()
    {
        try{
            $client = new SoapClient($this->url,$this->params);
            $colorXML = $client->Color(["Negocio"=>"1195","Usuario"=>"14275","Clave"=>"kdEDyC9F"]);
            // dd(simplexml_load_string($colorXML->ColorResult)->color);
            $colores=$this->convertXMLtoArray(simplexml_load_string($colorXML->ColorResult)->color);
            if (isset($colores)) {
                return response()->json(['colores'=>$colores],201);
            }
            else{
                return response()->json(['error'=>"Colores no encontrados",404]);
            }
        }catch(SoapFault $fault){
            dd($fault);
        }
    }
    public function delMuns($estado)
    {
        try{
            $client = new SoapClient($this->url,$this->params);
            $municipioXML = $client->DelMun(["Estado"=>$estado,"Negocio"=>"1195","Usuario"=>"14275","Clave"=>"kdEDyC9F"]);
            // dd(simplexml_load_string($municipioXML->DelMunResult)->delmun);
            $municipios=$this->convertXMLtoArray(simplexml_load_string($municipioXML->DelMunResult)->delmun);
            if (isset($municipios)) {
                return response()->json(['municipios'=>$municipios],201);
            }
            else{
                return response()->json(['error'=>"Municipios no encontrados",404]);
            }
        }catch(SoapFault $fault){
            dd($fault);
        }
    }
    public function estados()
    {
        try{
            $client = new SoapClient($this->url,$this->params);
            $estadosXML = $client->EDOS(["Negocio"=>"1195","Usuario"=>"14275","Clave"=>"kdEDyC9F"]);
            $estados=$this->convertXMLtoArray(simplexml_load_string($estadosXML->EDOSResult)->estado);
            if (isset($estados)) {
                return response()->json(['estados'=>$estados],201);
            }
            else{
                return response()->json(['error'=>"Estados no encontrados",404]);
            }
        }catch(SoapFault $fault){
            dd($fault);
        }
    }
    public function formaPagos()
    {
        try{
            $client = new SoapClient($this->url,$this->params);
            $formaPagoXML = $client->FormaPago(["Negocio"=>"1195","Usuario"=>"14275","Clave"=>"kdEDyC9F"]);
            $formapagos=$this->convertXMLtoArray(simplexml_load_string($formaPagoXML->FormaPagoResult)->formapago);
            if (isset($formapagos)) {
                return response()->json(['formapagos'=>$formapagos],201);
            }
            else{
                return response()->json(['error'=>"Forma de pagos no encontrados",404]);
            }
        }catch(SoapFault $fault){
            dd($fault);
        }
    }
    public function giros()
    {
        try{
            $client = new SoapClient($this->url,$this->params);
            $giroXML = $client->GiroEmpresa(["Negocio"=>"1195","Usuario"=>"14275","Clave"=>"kdEDyC9F"]);
            $giros = $this->convertXMLtoArray(simplexml_load_string($giroXML->GiroEmpresaResult)->giroempresa);
            if (isset($giros)) {
                return response()->json(['giros'=>$giros],201);
            }
            else{
                return response()->json(['error'=>"Giros no encontrados",404]);
            }
        }catch(SoapFault $fault){
            dd($fault);
        }
    }
    public function identificaciones()
    {
        try{
            $client = new SoapClient($this->url,$this->params);
            $identificacionesXML = $client->Identificacion(["Negocio"=>"1195","Usuario"=>"14275","Clave"=>"kdEDyC9F"]);
            $identificaciones=$this->convertXMLtoArray(simplexml_load_string($identificacionesXML->IdentificacionResult)->identificiacion);
            if (isset($identificaciones)) {
                return response()->json(['identificaciones'=>$identificaciones],201);
            }
            else{
                return response()->json(['error'=>"Identificaciones no encontradas",404]);
            }
        }catch(SoapFault $fault){
            dd($fault);
        }
    }
    public function marcas($modelo)
    {
        try{
            $client = new SoapClient($this->url,$this->params);
            $marcasXML = $client->Marca(["Negocio"=>"1195","Modelo"=>$modelo,"Categoria"=>100,"Usuario"=>"14275","Clave"=>"kdEDyC9F"]);
            $marcas=$this->convertXMLtoArray(simplexml_load_string($marcasXML->MarcaResult)->marca);
            if (isset($marcas)) {
                return response()->json(['marcas'=>$marcas],201);
            }
            else{
                return response()->json(['error'=>"Marcas no encontradas",404]);
            }
        }catch(SoapFault $fault){
            dd($fault);
        }
    }
    public function modelos()
    {
        try{
            $client = new SoapClient($this->url,$this->params);
            $modelosXML = $client->Modelo(["Negocio"=>"1195","Usuario"=>"14275","Clave"=>"kdEDyC9F"]);
            $modelosResp = json_decode(json_encode(simplexml_load_string($modelosXML->ModeloResult)),true);
            if (isset($modelosResp['modelo'])) {
                $modelos = $modelosResp['modelo'];
                return response()->json(['modelos'=>$modelos],201);
            }
            else{
                return response()->json(['error'=>"Modelos no encontrados",404]);
            }
        }catch(SoapFault $fault){
            dd($fault);
        }
    }
   
    public function nacionalidades()
    {
        try{
            $client = new SoapClient($this->url,$this->params);
            $nacionalidadesXML = $client->Nacionalidad(["Negocio"=>"1195","Usuario"=>"14275","Clave"=>"kdEDyC9F"]);
            $xml = simplexml_load_string($nacionalidadesXML->NacionalidadResult)->nacionalidad;
            $nacionalidades =  $this->convertXMLtoArray($xml);
            if (isset($nacionalidades)) {
                return response()->json(['nacionalidades'=>$nacionalidades],201);
            }
            else{
                return response()->json(['error'=>"Nacionalidades no encontradas",404]);
            }
        }catch(SoapFault $fault){
            dd($fault);
        }
    }
    public function ocupaciones()
    {
        try{
            $client = new SoapClient($this->url,$this->params);
            $ocupacionesXML = $client->Ocupacion(["Negocio"=>"1195","Usuario"=>"14275","Clave"=>"kdEDyC9F"]);
            $xml=simplexml_load_string($ocupacionesXML->OcupacionResult)->ocupacion;
            $ocupaciones = $this->convertXMLtoArray($xml);
            // dd($ocupacionesResp);
            if (isset($ocupaciones)) {
                return response()->json(['ocupaciones'=>$ocupaciones],201);
            }
            else{
                return response()->json(['error'=>"Ocupaciones no encontradas",404]);
            }
        }catch(SoapFault $fault){
            dd($fault);
        }
    }
    public function subMarcas($marca,$modelo)
    {
        try{
            $client = new SoapClient($this->url,$this->params);
            $submarcasXML = $client->SubMarca(["Negocio"=>"1195","Marca"=>$marca,"Modelo"=>$modelo,"Categoria"=>100,"Usuario"=>"14275","Clave"=>"kdEDyC9F"]);
            // dd(simplexml_load_string($submarcasXML->SubMarcaResult)->submarca);
            $submarcas=[];
            foreach (simplexml_load_string($submarcasXML->SubMarcaResult)->submarca as $value) {
                $object=json_decode(json_encode($value),true);
                array_push($submarcas,['id'=>$object['@attributes']['clave'],'descripcion'=>$object[0]]);
            }
            if (isset($submarcas)) {
                return response()->json(['submarcas'=>$submarcas],201);
            }
            else{
                return response()->json(['error'=>"Sub-Marcas no encontradas",404]);
            }
        }catch(SoapFault $fault){
            dd($fault);
        }
    }
    public function transaccion(Request $request,$tipo)
    {
        try{
            $client = new SoapClient($this->url,$this->params);
            $submarcasXML = $client->Transaccion(["XML"=>"#TODO","TipoTransaccion"=>$tipo,"Usuario"=>"14275","Clave"=>"kdEDyC9F"]);
            // TODO
            // dd($submarcasXML);
            // $submarcasResp = json_decode(json_encode(simplexml_load_string($submarcasXML->SubMarcaResult)),true);
            // dd($submarcasResp);
            // if (isset($submarcasResp['submarca'])) {
            //     $submarcas = $submarcasResp['submarca'];
            //     return response()->json(['submarcas'=>$submarcas],201);
            // }
            // else{
            //     return response()->json(['error'=>"Sub-Marcas no encontradas",404]);
            // }
        }catch(SoapFault $fault){
            dd($fault);
        }
    }
    public function vehiculo($marca,$submarca,$modelo)
    {
        try{
            $client = new SoapClient($this->url,$this->params);
            $vehiculosXML = $client->Vehiculo(["Negocio"=>"1195","Marca"=>$marca,"Submarca"=>$submarca,"Modelo"=>$modelo,"Usuario"=>"14275","Clave"=>"kdEDyC9F"]);
            // dd(simplexml_load_string($vehiculosXML->VehiculoResult)->vehiculo);
            $vehiculos=[];
            foreach (simplexml_load_string($vehiculosXML->VehiculoResult)->vehiculo as $value) {
                $object = json_decode(json_encode($value),true);
                array_push($vehiculos,['clave'=>$object['@attributes']['clave'],'descripcion'=>$object[0]]);
            }
            if (isset($vehiculos)) {
                return response()->json(['vehiculos'=>$vehiculos],201);
            }
            else{
                return response()->json(['error'=>"Descripciones no encontradas",404]);
            }
        }catch(SoapFault $fault){
            dd($fault);
        }
    }
    public function catalogoVehi($modeloMin,$modeloMax)
    {
        try{
            $client = new SoapClient($this->url,$this->params);
            $catalogosXML = $client->CatVeh(["Negocio"=>"1195","ModeloMin"=>$modeloMin,"ModeloMax"=>$modeloMax,"Categ"=>100,"Usuario"=>"14275","Clave"=>"kdEDyC9F"]);
            // dd(simplexml_load_string($catalogosXML->CatVehResult)->vehiculo);
            $catalogos=[];
            foreach (simplexml_load_string($catalogosXML->CatVehResult)->vehiculo as $value) {
                $object=json_decode(json_encode($value),true);
                array_push($catalogos,['categoria'=>$object['@attributes']['categoria'],'modelo'=>$object['@attributes']['modelo'],'clave_armadora'=>$object['@attributes']['cvearmadora'],'armadora'=>$object['@attributes']['armadora'],'cvesubmarca'=>$object['@attributes']['cvesubmarca'],'submarca'=>$object['@attributes']['submarca'],'clave_amis'=>$object['@attributes']['cveamis'],'descripcion'=>$object[0]]);
            }
            if (isset($catalogos)) {
                return response()->json(['catalogos'=>$catalogos],201);
            }
            else{
                return response()->json(['error'=>"Descripciones no encontradas",404]);
            }
        }catch(SoapFault $fault){
            dd($fault);
        }
    }
}
