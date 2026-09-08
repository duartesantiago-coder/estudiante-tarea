<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estudiante;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estudiante::create([
            'nombre' => 'Carlos',
            'apellido' => 'Perez',
            'dni' => '12345678',
            'fecha_nacimiento' => '2000-01-01',
            'aula_id' => 1,
        ]);
        Estudiante::create([
            'nombre' => 'Maria',
            'apellido' => 'Gomez',
            'dni' => '87654321',
            'aula_id' => 1,
            'fecha_nacimiento' => '2001-02-02',
        ]);

        
        //
    }
}
