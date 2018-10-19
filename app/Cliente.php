<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //

    protected $table="cliente";

    protected $fillable=[
    	'uso_auto',
    	'marca_auto',
    	'modelo_auto',
    	'descripcion_auto',
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
    

}
