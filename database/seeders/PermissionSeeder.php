<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Crear actividad'
        ]);

        Permission::create([
            'name' => 'Leer actividad'
        ]);

        Permission::create([
            'name' => 'Actualizar actividad'
        ]);

        Permission::create([
            'name' => 'Eliminar actividad'
        ]);

        Permission::create([
            'name' => 'Ver dashboard'
        ]);

        Permission::create([
            'name' => 'Crear rol'
        ]);

        Permission::create([
            'name' => 'Listar rol'
        ]);

        Permission::create([
            'name' => 'Editar rol'
        ]);

        Permission::create([
            'name' => 'Eliminar rol'
        ]);

        Permission::create([
            'name' => 'Leer usuarios'
        ]);

        Permission::create([
            'name' => 'Editar usuarios'
        ]);
    }
}
