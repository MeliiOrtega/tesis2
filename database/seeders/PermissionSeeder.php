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
        Permission::create([  //1
            'name' => 'Crear actividad'
        ]);

        Permission::create([  //2
            'name' => 'Leer actividad'
        ]);

        Permission::create([  //3
            'name' => 'Actualizar actividad'
        ]);

        Permission::create([  //4
            'name' => 'Eliminar actividad'
        ]);

        Permission::create([  //5
            'name' => 'Ver dashboard'
        ]);

        Permission::create([ //6
            'name' => 'Crear rol'
        ]);

        Permission::create([ //7
            'name' => 'Listar rol'
        ]);

        Permission::create([ //8
            'name' => 'Editar rol'
        ]);

        Permission::create([ //9
            'name' => 'Eliminar rol'
        ]);

        Permission::create([ //10
            'name' => 'Leer usuarios'
        ]);

        Permission::create([ //11
            'name' => 'Editar usuarios'
        ]);

        Permission::create([ //12
            'name' => 'Eliminar usuarios'
        ]);

        Permission::create([ //13
            'name' => 'Ver mis actividades'
        ]);
    }
}
