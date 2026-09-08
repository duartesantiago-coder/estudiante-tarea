<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aula;

class AulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aula::create([
            'nombre' => 'Laboratorio de Informatica',
        ]);
        Aula::create([
            'nombre' => 'Aula de Matematica',
        ]);
    }
}
