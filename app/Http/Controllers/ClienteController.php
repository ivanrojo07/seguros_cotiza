<?php

namespace App\Http\Controllers;

use App\Cliente;
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
            'marca_auto'=>'required',
            'modelo_auto'=>"required|numeric",
            'descripcion_auto'=>"required|array",
            'cp'=>"required",
            'nombre'=>'required|string',
            'appaterno'=>'required|string',
            'apmaterno'=>'nullable|string',
            'telefono'=>'required|numeric',
            'email'=>"required|email",
            'sexo'=>'required|in:Hombre,Mujer,Otro',
            'f_nac'=>"required|date"

        ];
        $this->validate($request,$rules);
        // dd($request->descripcion_auto['cVersion']);

        $cliente = Cliente::create([
            "uso_auto"=>$request->uso_auto,
            'marca_auto'=>$request->marca_auto,
            'modelo_auto'=>$request->modelo_auto,
            'descripcion_auto'=>$request->descripcion_auto['cVersion'],
            'tipo_auto'=>$request->descripcion_auto['cTipo'],
            'c_amis'=>$request->descripcion_auto['CAMIS'],
            'cp'=>$request->cp,
            'nombre'=>$request->nombre,
            'appaterno'=>$request->appaterno,
            'apmaterno'=>$request->apmaterno,
            'telefono'=>$request->telefono,
            'email'=>$request->email,
            'sexo'=>$request->sexo,
            'f_nac'=>$request->f_nac
        ]);

        $cliente->cotizacion = $cliente->generarCotizacion();
        $cliente->save();
        $cliente->emailCotizacion();
        return response()->json(['cotizacion'=>$cliente],201);
    }

    public function search(Request $request){
        $cliente = Cliente::where('cotizacion',$request->cotizacion)->first();
        if($cliente != null){
            return response()->json(['cotizacion'=>$cliente],200);
        }
        else{
            return response()->json(['error'=>'Cotización no encontrada'],404);
        }
    }

}
