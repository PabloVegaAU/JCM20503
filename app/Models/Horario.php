<?php

namespace App\Models;

use App\Models\Aula;
use App\Models\Curso;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Horario extends Model
{
    use HasFactory;

    protected $guarded = [];

    // VARIOS HORARIOS PERTENECEN A UN AULA
    public function aulas()
    {
        return $this->belongsTo(Aula::class);
    }
    // UN HORARIO TIENE UN CURSO
    public function cursos()
    {
        return $this->belongsTo(Curso::class);
    }
}
