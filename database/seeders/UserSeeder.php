<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        User::insert([
            'name' => 'Wilian Ponce',
            'email' => "wily2809@hotmail.com",
            'password' => Hash::make('12345678'),
            'empresa_id' => 1,
            'punto_emision_id' => 1,
            'establecimiento_id' => 1,
            'estado' => true
        ]);
        User::insert([
            'name' => 'David Cruz',
            'email' => "davidcruz@demo.com",
            'password' => Hash::make('12345678'),
            'empresa_id' => 1,
            'punto_emision_id' => 1,
            'establecimiento_id' => 1,
            'estado' => true
        ]);
        User::insert([
            'name' => 'Leonardo Sanchez Cruz',
            'email' => "leosanchez@demo.com",
            'password' => Hash::make('12345678'),
            'empresa_id' => 1,
            'punto_emision_id' => 1,
            'establecimiento_id' => 1,
            'estado' => true
        ]);
        User::insert([
            'name' => 'Administrador',
            'email' => "administrador@demo.com",
            'password' => Hash::make('12345678'),
            'empresa_id' => 1,
            'punto_emision_id' => 1,
            'establecimiento_id' => 1,
            'estado' => true
        ]);
        User::insert([
            'name' => 'Usuario',
            'email' => "usuario@demo.com",
            'password' => Hash::make('12345678'),
            'empresa_id' => 1,
            'punto_emision_id' => 1,
            'establecimiento_id' => 1,
            'estado' => true
        ]);
        User::factory()->times(5)->create();

        User::first()->assignRole(1);
        User::find(2)->assignRole(1);
        User::find(3)->assignRole(1);
        User::find(4)->assignRole(1);
        User::find(5)->assignRole(2);
    }
}
