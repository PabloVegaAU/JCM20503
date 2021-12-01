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

    protected $primaryKey = "user_id";

    // UN ESTUDIANTE UN USUARIO
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // VARIOS ESTUDIANTES UN AULA
    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
