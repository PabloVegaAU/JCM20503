<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AulaController;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\Admin\DocenteController;
use App\Http\Controllers\Admin\HorarioController;
use App\Http\Controllers\Admin\EstudianteController;

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('', [HomeController::class, 'index'])->name('AulaVirtual');

Route::resource('Estudiantes', EstudianteController::class)->names('admin.estudiantes');
Route::resource('Docentes', DocenteController::class)->names('admin.docentes');
Route::resource('Aulas', AulaController::class)->names('admin.aulas');
Route::resource('Cursos', CursoController::class)->names('admin.cursos');
Route::resource('Horarios', HorarioController::class)->names('admin.horarios');
