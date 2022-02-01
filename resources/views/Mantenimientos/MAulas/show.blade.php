@extends('adminlte::page')

@section('title', 'Man. Aulas')

@section('content_header')
<h1 class="text-uppercase">Aula
    @switch($aula->grado)
    @case(1)
    1ro
    @break
    @case(2)
    2do
    @break
    @case(3)
    3ro
    @break
    @case(4)
    4to
    @break
    @case(5)
    5to
    @break
    @case(6)
    6to
    @break
    @endswitch
    {{$aula->seccion}}</h1>
@stop

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header text-uppercase">Estudiantes</div>
        <div class="card-body">
            <div class="table-responsive" style="width: 100%;">
                <table id="example" class="table table-hover" style="font-size: 95%">
                    <thead>
                        <tr class="bg-primary">
                            <th scope="col">Nombres Completos</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Dni</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Fecha de nacimiento</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Dirección</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estudiantes as $estudiante)
                        <tr>
                            <td>{{ $estudiante->nombres }} {{ $estudiante->apellidos }}</td>
                            <td>
                                @if ($estudiante->sexo == 'm')
                                Masculino
                                @else
                                Femenino
                                @endif
                            </td>
                            <td>{{ $estudiante->dni }}</td>
                            <td>{{ $estudiante->edad }}</td>
                            <td>{{ $estudiante->fnacimiento }}</td>
                            <td>{{ $estudiante->ntelefono }}</td>
                            <td>{{ $estudiante->direccion }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-primary">
                            <th scope="col">Nombres Completos</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Dni</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Fecha de nacimiento</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Dirección</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    {{-- Horario --}}
    <div class="card">
        <div class="card-header text-uppercase">Horario</div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h2 class="bg-primary text-center">Lunes</h2>
                    @foreach ($aula->horarios->sortBy('hora_i') as $horario)
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
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="col">
                    <h2 class="bg-white text-center">Martes</h2>
                    @foreach ($aula->horarios->sortBy('hora_i') as $horario)
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
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="col">
                    <h2 class="bg-primary text-center">Miercoles</h2>
                    @foreach ($aula->horarios->sortBy('hora_i') as $horario)
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
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="col">
                    <h2 class="bg-white text-center">Jueves</h2>
                    @foreach ($aula->horarios->sortBy('hora_i') as $horario)
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
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="col">
                    <h2 class="bg-primary text-center">Viernes</h2>
                    @foreach ($aula->horarios->sortBy('hora_i') as $horario)
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
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
{{-- DataTable --}}
<script>
    $(document).ready(function() {
            $('#example').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                }
            });
        });
</script>
@stop
