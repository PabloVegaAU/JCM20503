<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\User;
use App\models\Curso;

class Docente extends Model
{
    use HasFactory;

    protected $guarded = [];

    // UN DOCENTE UN USUARIO
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //UN DOCENTE PERTENECE  A MUCHAS ESPECIALIDADES
    public function cursos()
    {
        return $this->belongsToMany(Curso::class);
    }
}
