@extends('adminlte::page')

@section('title', 'Man. Horarios')

@section('content_header')
<h1>Mantenimiento de Horarios</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive" style="width: 100%;">
                <table id="table" class="table table-hover" style="font-size: 95%;">
                    <thead>
                        <tr class="bg-primary">
                            <th scope="col">Aula</th>
                            <th scope="col">Día</th>
                            <th scope="col">Curso</th>
                            <th scope="col">Docente</th>
                            <th scope="col">Hora de Inicio</th>
                            <th scope="col">Hora Final</th>
                            {{-- <th scope="col">Acciones</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($horarios as $horario)
                        <tr>
                            <th scope="row">{{ $horario->aula->grado }}{{ $horario->aula->seccion }}</th>
                            <td>@switch($horario->dia)
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
                            </td>
                            <td>
                                {{$horario->curso->ncurso}} </td>
                            <td>{{$horario->docente->nombres}}
                                {{$horario->docente->apellidos}}
                            </td>
                            @if ($horario->hora_i>$horario->hora_f)
                            <td>{{$horario->hora_f}}</td>
                            <td>{{$horario->hora_i}}</td>
                            @else
                            <td>{{$horario->hora_i}}</td>
                            <td>{{$horario->hora_f}}</td>
                            @endif
                            {{-- <td style="display:flex">
                                <!-- EDITAR -->
                                <a href=" {{ route('admin.horarios.edit', $horario->id) }}" class="btn btn-success"
                                    style="font-size: 95%;margin-right: 1vh">Editar</a>
                                <!-- ELIMINIAR -->
                                <form action="{{ route('admin.horarios.destroy', $horario->id) }}" method="post"
                                    class="formulario-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" id="delete" value="Eliminar" class="btn btn-danger"
                                        style="margin: 0px 0px 0px 5px;font-size: 95%">
                                </form>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-primary">
                            <th scope="col">Aula</th>
                            <th scope="col">Día</th>
                            <th scope="col">Curso</th>
                            <th scope="col">Docente</th>
                            <th scope="col">Hora de Inicio</th>
                            <th scope="col">Hora Final</th>
                            {{-- <th scope="col">Acciones</th> --}}
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
{{-- DataTable --}}
<script>
    $(document).ready(function() {
            $('#table').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                }
            });
        });
</script>
@stop
