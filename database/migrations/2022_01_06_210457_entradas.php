<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Entradas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Entradas', function (Blueprint $table) {
            $table->bigIncrements('ID_Entrada')->unique();
            $table->integer('ID_Bitacora');
            $table->time('Hora');
            $table->string('Frecuencia');
            $table->string('Nombre_actividad');
            $table->text('Descripcion_actividad');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Entradas');
    }
}
