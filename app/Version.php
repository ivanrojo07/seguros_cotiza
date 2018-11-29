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

     public function getDigAttribute()
    {
        $camis = $this->camis_qualitas;
        $sum_impar = 0;

        $sum_par=0;
       if(strlen($camis) <5){
            $camis = str_pad($camis,5,'0',STR_PAD_LEFT);
        }
        for($i=0;$i<strlen($camis);$i++){
            if (($i+1)%2 != 0) {
              // var_dump($camis[$i]);
                // var_dump($i);
                $sum_impar += $camis[$i];
            }
            else{
                $sum_par +=$camis[$i];
            }
        }
        // var_dump($sum_impar);
        $sum_impar = $sum_impar*3;
        $sum_impar = (string)$sum_impar; 
        // // $sum_par = 0;
        // for ($i = 0; $i < strlen($camis); $i++) {
        //   $sum_par += $sum_impar[$i];
        // }
        // var_dump($sum_impar);
        // var_dump($sum_par);
        $et4 = $sum_impar+$sum_par;
        // var_dump($et4);
        $et5 = $et4%10;
        // dd($et5);
        if($et5 != 0){
          $digito = 10-$et5;
        }
        else{
            $digito = '0';
        }
        return (int)$digito;

        
    }
}
