<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipo;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
        'name' => 'Administrador',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('123456'),
        'rol' => 'admin'
        ]);
        Equipo::create([
            'nombre' => 'Computadora 1',
            'tipo' => 'Escritorio',
            'descripcion' => 'Equipo del laboratorio',
            'disponible' => true
        ]);

        Equipo::create([
            'nombre' => 'Computadora 2',
            'tipo' => 'Escritorio',
            'descripcion' => 'Equipo del laboratorio',
            'disponible' => true
        ]);

        Equipo::create([
            'nombre' => 'Laptop 1',
            'tipo' => 'Laptop',
            'descripcion' => 'Laptop para estudiantes',
            'disponible' => true
        ]);
    }
}