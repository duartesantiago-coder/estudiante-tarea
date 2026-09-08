<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    /** @use HasFactory<\Database\Factories\EstudianteFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'fecha_nacimiento',
        'foto_perfil',
        'aula_id',
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class, 'aula_id');
    }
}
