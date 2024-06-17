<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Jhon Jairo',
            'email' => 'jhonja14795@gmail.com',
            'password' => bcrypt('Laravel@345') //Metodo encriptar contraseña
        ])->assignRole('Admin');

        User::factory(60)->create();
    }
}
