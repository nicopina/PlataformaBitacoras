<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bitacoras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Bitacoras', function (Blueprint $table) {
            $table->bigIncrements('ID_Bitacora')->unique();
            $table->integer('ID_Usuario');
            $table->date('Fecha');
            $table->foreign('ID_Usuario')->references('ID')->on('Users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Bitacoras');
    }
}
