<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Bitacora;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $Bitacora = new Bitacora();
        $Bitacora->ID_Usuario = 123;
        $Bitacora->Fecha = date(now());
        $Bitacora->save();

    }
}
