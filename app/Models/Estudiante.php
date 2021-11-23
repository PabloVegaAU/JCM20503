<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\User;
use App\models\Aula;

class Estudiante extends Model
{
    use HasFactory;

    protected $guarded = [];

    // UN ESTUDIANTE UN USUARIO
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    // VARIOS ESTUDIANTES UN AULA
    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
