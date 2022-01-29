<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AulaController;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\Admin\DocenteController;
use App\Http\Controllers\Admin\HorarioController;
use App\Http\Controllers\Admin\EstudianteController;
use App\Http\Controllers\Estudiante\EController;
use App\Http\Controllers\Docente\DController;
use App\Http\Controllers\Recurso\RController;

// OPCIONES DESACTIVADAS
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

// PRINCIPAL

Route::get('', [HomeController::class, 'index'])->name('AulaVirtual');
// MANTENIMIENTOS
Route::resource('Estudiantes', EstudianteController::class)->names('admin.estudiantes');
Route::resource('Docentes', DocenteController::class)->names('admin.docentes');
Route::resource('Aulas', AulaController::class)->names('admin.aulas');
Route::resource('Cursos', CursoController::class)->names('admin.cursos');
Route::resource('Horarios', HorarioController::class)->names('admin.horarios');
// ESTUDIANTE
Route::resource('Horario', EController::class)->names('estudiante');
// DOCENTE
Route::resource('Docente', DController::class)->names('docente');
// DOCENTE
Route::resource('Recurso', RController::class)->names('recurso');

// PERFIL
Route::get('Perfil', function () {
    return view('Perfil');
})->name('Perfil')->middleware('auth');
