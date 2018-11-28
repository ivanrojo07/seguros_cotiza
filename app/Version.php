<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    //

    protected $fillable=[
    	'amis_gs',
    	'descripcion',
    	'camis_qualitas',
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
