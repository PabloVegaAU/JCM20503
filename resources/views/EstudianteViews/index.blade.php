@extends('adminlte::page')

@section('title')

@section('content_header')
<h1 class="text-uppercase">Horario: {{$estudiante->aula->grado}} {{$estudiante->aula->seccion}}</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Mis Cursos</div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h2 class="bg-primary text-center">Lunes</h2>
                    @foreach ($estudiante->aula->horarios->sortBy('hora_i') as $horario)
                    @if ($horario->dia == '1')
                    <div class="row p-3">
                        <div class="btn-outline-primary w-100 text-center">
                            {{$horario->curso->ncurso}}
                        </div>
                        <div class="w-100 text-center">
                            {{$horario->docente->nombres}} {{$horario->docente->apellidos}}
                        </div>
                        <div class="w-100 text-center">
                            {{$horario->hora_i}} - {{$horario->hora_f}}
                        </div>
                        <div class="w-100 text-center">
                            <a href="{{ route('estudiante.show',$horario->id) }}" class="btn btn-warning"
                                style="font-size: 95%">Ver Curso</a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="col">
                    <h2 class="bg-white text-center">Martes</h2>
                    @foreach ($estudiante->aula->horarios->sortBy('hora_i') as $horario)
                    @if ($horario->dia == '2')
                    <div class="row p-3">
                        <div class="btn-outline-dark w-100 text-center">
                            {{$horario->curso->ncurso}}
                        </div>
                        <div class="w-100 text-center">
                            {{$horario->docente->nombres}} {{$horario->docente->apellidos}}
                        </div>
                        <div class="w-100 text-center">
                            {{$horario->hora_i}} - {{$horario->hora_f}}
                        </div>
                        <div class="w-100 text-center">
                            <a href="{{ route('estudiante.show', $horario->id) }}" class="btn btn-warning"
                                style="font-size: 95%">Ver Curso</a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="col">
                    <h2 class="bg-primary text-center">Miercoles</h2>
                    @foreach ($estudiante->aula->horarios->sortBy('hora_i') as $horario)
                    @if ($horario->dia == '3')
                    <div class="row p-3">
                        <div class="btn-outline-primary w-100 text-center">
                            {{$horario->curso->ncurso}}
                        </div>
                        <div class="w-100 text-center">
                            {{$horario->docente->nombres}} {{$horario->docente->apellidos}}
                        </div>
                        <div class="w-100 text-center">
                            {{$horario->hora_i}} - {{$horario->hora_f}}
                        </div>
                        <div class="w-100 text-center">
                            <a href="{{ route('estudiante.show',$horario->id) }}" class="btn btn-warning"
                                style="font-size: 95%">Ver Curso</a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="col">
                    <h2 class="bg-white text-center">Jueves</h2>
                    @foreach ($estudiante->aula->horarios->sortBy('hora_i') as $horario)
                    @if ($horario->dia == '4')
                    <div class="row p-3">
                        <div class="btn-outline-dark w-100 text-center">
                            {{$horario->curso->ncurso}}
                        </div>
                        <div class="w-100 text-center">
                            {{$horario->docente->nombres}} {{$horario->docente->apellidos}}
                        </div>
                        <div class="w-100 text-center">
                            {{$horario->hora_i}} - {{$horario->hora_f}}
                        </div>
                        <div class="w-100 text-center">
                            <a href="{{ route('estudiante.show',$horario->id) }}" class="btn btn-warning"
                                style="font-size: 95%">Ver Curso</a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="col">
                    <h2 class="bg-primary text-center">Viernes</h2>
                    @foreach ($estudiante->aula->horarios->sortBy('hora_i') as $horario)
                    @if ($horario->dia == '5')
                    <div class="row p-3">
                        <div class="btn-outline-primary w-100 text-center">
                            {{$horario->curso->ncurso}}
                        </div>
                        <div class="w-100 text-center">
                            {{$horario->docente->nombres}} {{$horario->docente->apellidos}}
                        </div>
                        <div class="w-100 text-center">
                            {{$horario->hora_i}} - {{$horario->hora_f}}
                        </div>
                        <div class="w-100 text-center">
                            <a href="{{ route('estudiante.show', $horario->id) }}" class="btn btn-warning"
                                style="font-size: 95%">Ver Curso</a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@stop
