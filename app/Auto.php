<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    //

    protected $hidden=['created_at','updated_at'];
    public function marca()
    {
    	return $this->hasOne('App\Marca');
    }
    public function submarca()
    {
    	return $this->hasOne('App\Submarca');
    }
    public function version()
    {
    	return $this->hasOne('App\Version');
    }
    public function cliente()
    {
		return $this->belongsTo('App\Cliente','cliente_id');    	
    }
}
