@extends('adminlte::page')

@section('title')

@section('content_header')
<h1 class="text-uppercase"></h1>
@stop

@section('content')
<div class="container">
    @foreach ($horarios->sortBy('dia') as $horario)
    <div class="card">
        <div class="card-header text-uppercase my-auto">
            {{$horario->aula->grado}} {{$horario->aula->seccion}} @if ($horario->aula->turno=="p")
            Primaria
            @else
            Secundaria
            @endif | {{$horario->curso->ncurso}} -
            @switch($horario->dia)
            @case('1')
            Lunes
            @break
            @case('2')
            Martes
            @break
            @case('3')
            Miercoles
            @break
            @case('4')
            Jueves
            @break
            @case('5')
            Viernes
            @break
            @endswitch
            <a href="{{ route('docente.show', $horario->id) }}" class="btn btn-warning text-white ml-5"
                style=";font-size: 95%">Ver
                Clase</a>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target="#exampleModalLong">
                Estudiantes
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card text-center">
                                <ul class="list-group">
                                    <li class="list-group-item active">
                                        <strong>
                                            Estudiantes
                                        </strong>
                                    </li>
                                    @foreach ($horario->aula->estudiantes as $estudiante)
                                    <li class="list-group-item">
                                        <strong>
                                            {{$estudiante->nombres}} {{$estudiante->apellidos}}
                                        </strong>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@stop

@section('js')
@if (session('mensaje') == 'ok')
<script>
    Swal.fire(
                'Eliminado!',
                'El recurso se ha eliminado correctamente.',
                'error'
            )
</script>
@endif
@stop
