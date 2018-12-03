<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CP extends Model
{
    //

    protected $table="codigo_postal";

    protected $fillable=[
    	'id',
		'codigo_postal',
        'cestado',
		'poblacion',
		'municipio',
		'estado',
		'ciudad',
        'codigo_municipio'
    ];

    protected $hidden=[
    	'created_at',
    	'updated_at',
    ];

}
