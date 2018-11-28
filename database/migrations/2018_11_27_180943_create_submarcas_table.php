<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmarcasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submarcas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('auto_id')->unsigned();
            $table->foreign('auto_id')->references('id')->on('autos');
            $table->integer('id_gs')->unsigned()->nullable();
            $table->string('nombre');
            $table->integer('id_seg_gs')->nullable();
            $table->year('anio');
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
        Schema::dropIfExists('submarcas');
    }
}
