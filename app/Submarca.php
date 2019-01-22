<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submarca extends Model
{
    //
    protected $fillable=[
        'id_ana',
        'nombre',
    	'id_gs',
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
