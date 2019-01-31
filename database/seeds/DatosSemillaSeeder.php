<?php

use App\Rol;
use App\User;
use App\Zona;
use Illuminate\Database\Seeder;

class DatosSemillaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $zona = Zona::create(['nombre' => 'Santa Cruz']);
        $rol = Rol::create(['nombre' => 'admin']);

        $user = User::create(
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('secret'),
                'id_zona' => $zona->id,
                'id_rol' => $rol->id,
                'telefono' => '72678859',
                'direccion' => 'Av alemana cruzimex 2121'
            ]
        );
    }
}
