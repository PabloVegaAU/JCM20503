<?php

namespace App\Models;

use App\Models\Curso;
use App\Models\Docente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recursos extends Model
{
    use HasFactory;

    protected $guarded = [];

    // UN RECURSO TIENE UN DOCENTE
    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
    // UN RECURSO TIENE UN DOCENTE
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
