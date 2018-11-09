<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cotizacion')->unique()->nullable();
            $table->string('uso_auto');
            $table->string('marca_auto');
            $table->integer('modelo_auto');
            $table->string('descripcion_auto');
            $table->string('tipo_auto');
            $table->string('c_amis');
            $table->string('cp');
            $table->string('cestado');
            $table->string('nombre');
            $table->string('appaterno');
            $table->string('apmaterno')->nullable();
            $table->string('telefono');
            $table->string('email');
            $table->string('sexo');
            $table->date('f_nac');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}
