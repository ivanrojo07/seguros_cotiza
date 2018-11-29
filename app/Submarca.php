<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submarca extends Model
{
    //
    protected $fillable=[
    	'id_gs',
    	'nombre',
    	'id_seg_gs',
    	'anio'
    ];

    protected $hidden = [
    	 "created_at",
    	 "updated_at"
    ];

    public function auto()
    {
    	return $this->belongsTo('App\Auto');
    }
}
