<?php

namespace App\Models;

use App\Models\Horario;
use App\models\Estudiante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aula extends Model
{
    use HasFactory;

    protected $guarded = [];

    // UN ESTUDIANTE UN AULA
    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }
    // UN HORARIO VARIAS AULAS
    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
}
