<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'genesis',
            'email' => 'genesisortega60@hotmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin'
        ]);

        $user->assignRole('admin');

        /* User::factory(15)->create(); */
    }
}
