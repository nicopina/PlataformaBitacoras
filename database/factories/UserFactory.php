<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ID' => 0,
            'Contraseña' => bcrypt('password'), // password
            'remember_token' => Str::random(10),
            'Rol'=> 0,
            'Bloqueado'=> false,
            'Nombre'=>'prueba',
            'Segundo_nombre'=>'1',
            'Apellido'=>'admin',
            'Segundo_apellido'=>'1',
            'ID_Area'=>0
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            /* return [
                'email_verified_at' => null,
            ]; */
        });
    }
}
