<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    /** @use HasFactory<\Database\Factories\AulaFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'aula_id');
    }
}
