<?php

namespace App\Models;

use App\Models\Aula;
use App\Models\Curso;
use App\Models\Docente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Horario extends Model
{
    use HasFactory;

    protected $guarded = [];

    // VARIOS HORARIOS PERTENECEN A UN AULA
    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
    // UN HORARIO TIENE UN CURSO
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
}
