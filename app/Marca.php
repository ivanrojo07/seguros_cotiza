<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    //

    protected $fillable=[
    	'id_gs',
    	'nombre',
    ];

    protected $hidden=[
    	'created_at',
    	'updated_at'
    ];

    public function auto()
    {
    	return $this->belongsTo('App\Auto');
    }

}
