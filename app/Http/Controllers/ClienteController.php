<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Auto;
use App\Marca;
use App\Submarca;
use App\Version;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClienteController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules=[
            'uso_auto'=>'required',
            'marca_auto'=>'required|array',
            'submarca_auto'=>'required|array',
            'modelo_auto'=>"required|numeric",
            'descripcion_auto'=>"required|array",
            'cp'=>"required",
            'cestado'=>'required',
            'nombre'=>'required|string',
            'appaterno'=>'required|string',
            'apmaterno'=>'nullable|string',
            'telefono'=>'required|numeric',
            'email'=>"required|email",
            'sexo'=>'required|in:Hombre,Mujer,Otro',
            'f_nac'=>"required|date"

        ];
        $this->validate($request,$rules);
        // dd($request);

        $cliente = Cliente::create([
            "uso_auto"=>$request->uso_auto,
            'cp'=>$request->cp,
            'cestado'=>$request->cestado,
            'nombre'=>$request->nombre,
            'appaterno'=>$request->appaterno,
            'apmaterno'=>$request->apmaterno,
            'telefono'=>$request->telefono,
            'email'=>$request->email,
            'sexo'=>$request->sexo,
            'f_nac'=>$request->f_nac
        ]);
        $auto = new Auto();
        $cliente->auto()->save($auto);
        $marca = new Marca([
            'id_gs'=>$request->marca_auto['id'],
            'nombre'=>$request->marca_auto['descripcion']
        ]);
        $auto->marca()->save($marca);
        $submarca=new Submarca([
            // "id_gs"=>$request->submarca_auto['id'],
            "nombre"=>$request->submarca_auto['descripcion'],
            // "id_seg_gs"=>$request->submarca_auto['idSegmento'],
            "id_seg_gs"=>"1",
            "anio"=>$request->modelo_auto,
        ]);
        $auto->submarca()->save($submarca);
        $version = new Version([
            'amis_gs'=>$request->descripcion_auto['clave'],
            'descripcion'=>$request->descripcion_auto['descripcion'],
        ]);

        $auto->version()->save($version);

        $cliente->cotizacion = $cliente->generarCotizacion();
        $cliente->save();
        $cliente->emailCotizacion();
        return response()->json(['cotizacion'=>$cliente],201);
    }

    public function search(Request $request){
        $cliente = Cliente::where('cotizacion',$request->cotizacion)->with(['auto','auto.marca','auto.submarca','auto.version'])->first();
        if($cliente != null){
            // $cliente->;
            return response()->json(['cotizacion'=>$cliente],200);
        }
        else{
            return response()->json(['error'=>'Cotización no encontrada'],404);
        }
    }

}
