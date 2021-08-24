<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);

        $role->permissions()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]);

        Role::create(['name' => 'usuario']);

        $role = Role::create(['name' => 'voluntario']);
        $role->syncPermissions(['Crear actividad', 'Leer actividad', 'Actualizar actividad', 'Eliminar actividad',]);


    }
}
