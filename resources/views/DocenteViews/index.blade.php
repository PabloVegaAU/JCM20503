@extends('adminlte::page')

@section('title')

@section('content_header')
<h1 class="text-uppercase"></h1>
@stop

@section('content')
<div class="container">
    @foreach ($horarios->sortByDesc('aula_id') as $horario)
    <div class="card">
        <div class="card-header text-uppercase">
            {{$horario->aula->grado}} {{$horario->aula->seccion}} @if ($horario->aula->turno=="p")
            Primaria
            @else
            Secundaria
            @endif | {{$horario->curso->ncurso}} -
            @switch($horario->dia)
            @case('l')
            Lunes
            @break
            @case('me')
            Martes
            @break
            @case('mi')
            Miercoles
            @break
            @case('j')
            Jueves
            @break
            @case('v')
            Viernes
            @break
            @endswitch
            <a href="{{ route('docente.show', $horario->id) }}" class="btn btn-warning" style=";font-size: 95%">Ver
                Clase</a>
        </div>
    </div>
    @endforeach
</div>
@stop
