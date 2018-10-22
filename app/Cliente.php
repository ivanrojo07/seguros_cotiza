<?php

namespace App;

use App\Mail\CreateCotizacion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Cliente extends Model
{
    //

    protected $table="cliente";

    protected $fillable=[
    	'uso_auto',
    	'marca_auto',
    	'modelo_auto',
    	'descripcion_auto',
        'tipo_auto',
        'c_amis',
    	'cp',
    	'nombre',
    	'appaterno',
    	'apmaterno',
    	'telefono',
    	'email',
    	'sexo',
    	'f_nac'
    ];

    protected $hidden=[
    	'created_at',
    	'updated_at',
    ];

    public function generarCotizacion(){
    	return md5("$this->id $this->updated_at");
    }

    public function emailCotizacion(){
        $cliente = $this;
        // dd($cliente);
        Mail::to($cliente->email)->send(new CreateCotizacion($cliente));
    }
    

}
