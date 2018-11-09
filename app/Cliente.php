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
        'cestado',
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


    public function getUsoAttribute()
    {
        $uso = $this->uso_auto;
        // $codigo;
        // dd($uso);
        if($uso == "Servicio Público"){
            return "8";
        }
        if($uso == "Servicio Particular"){
            return "1";
        }
        // return $codigo;
    }

    public function getServicioAttribute()
    {
        $uso = $this->uso_auto;
        // $codigo;
        // dd($uso);
        if($uso == "Servicio Público"){
            return "2";
        }
        if($uso == "Servicio Particular"){
            return "1";
        }
        
        // return $codigo;
    }
    public function getDigAttribute()
    {
        $camis = $this->c_amis;
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
        return $digito;

        
    }

}
