@extends('adminlte::page')

@section('title', 'Man. Horarios')

@section('content_header')
<h1>Añadir horario</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            @if (session('msg'))
            <div class="alert alert-success">
                <strong>{{session('msg')}}</strong>
            </div>
            @endif

            @if (count($errors) > 0)
            <div class="text-danger">
                @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
            </div>
            @endif
        </div>
        <div class="card-body">
            {!! Form::open(['method' => 'POST', 'route' => 'admin.horarios.store']) !!}
            <div class="form-group form-row">
                <div class="col-sm">
                    {!! Form::label('aula_id', 'Aula') !!}
                    <select class="custom-select" name="aula_id">
                        <option selected disabled>Elegir Aula</option>
                        @foreach ($aulas as $aula)
                        <option value="{{ $aula->id}}" class="text-uppercase">
                            {{ $aula->grado}} {{ $aula->seccion}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    {!! Form::label('dia', 'Dia') !!}
                    <select class="custom-select" name="dia">
                        <option selected disabled>Elegir un dia de la semana</option>
                        <option value="l">Lunes</option>
                        <option value="me">Martes</option>
                        <option value="mi">Miercoles</option>
                        <option value="j">Jueves</option>
                        <option value="v">Viernes</option>
                    </select>
                </div>
            </div>
            <div class="form-group form-row">
                {{-- Seleccionar Cursos--}}
                <div class="col-sm ">
                    {!! Form::label('hora_i', 'Hora Inicio') !!}
                    {!! Form::time('hora_i', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm">
                    {!! Form::label('hora_f', 'Hora Inicio') !!}
                    {!! Form::time('hora_f', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <table id="table" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Curso</th>
                        <th>Docente</th>
                    </tr>
                </thead>
                @foreach ($cursos as $curso)
                <tr>
                    <td>
                        {!! Form::radio('curso_id', $curso->id, null, ['class' => 'mr-1']) !!}
                        {{ $curso->ncurso}}
                    </td>
                    <td>
                        <ul class="list-group">
                            @foreach ($curso->docentes as $docente)
                            <li class="list-group-item">
                                <strong>
                                    {!! Form::radio('docente_id', $docente->id, $curso->id, ['class' => 'mr-1']) !!}
                                    {{ $docente->nombres }}
                                </strong>
                            </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="text-center">
                {!! Form::submit('Crear', ['class' => 'btn btn-success','style'=>'margin-top:1vh;']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
@section('js')
<script>
    $('#table').DataTable(
        {
            "responsive":true,
            "auto-with":false,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
</script>
@stop
