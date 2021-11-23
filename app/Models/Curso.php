<?php

namespace App\Models;

use App\models\Docente;
use App\Models\Horario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curso extends Model
{
    use HasFactory;

    protected $guarded = [];

    //UN DOCENTE VARIOS CURSOS
    public function docentes()
    {
        return $this->belongsToMany(Docente::class);
    }
    //UN CURSO PERTENECE A UN HORARIO
    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
}
