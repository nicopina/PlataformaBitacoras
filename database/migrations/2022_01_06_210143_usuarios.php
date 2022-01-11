<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Users', function (Blueprint $table) {
            $table->integer('ID')->unique();
            $table->string('Contraseña');
            $table->integer('Rol');
            $table->boolean('Bloqueado');
            $table->string('Nombre');
            $table->string('Segundo_nombre');
            $table->string('Apellido');
            $table->string('Segundo_apellido');
            $table->integer('ID_Area');
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Users');
    }
}
