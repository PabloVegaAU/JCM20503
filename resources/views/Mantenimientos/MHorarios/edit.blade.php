@extends('adminlte::page')

@section('title')

@section('content_header')
<h1>Edición de Horario</h1>
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
            {!! Form::model($horario, ['route' => ['admin.horarios.update', $horario->id], 'method' =>
            'PUT'])!!}
            <div class="form-group form-row">
                {{-- Sleccionar Aula --}}
                <div class="col-sm">
                    {!! Form::label('aula_id', 'Aula') !!}
                    <select class="custom-select text-uppercase" name="aula_id">
                        @foreach ($aulas as $aula)
                        <option value="{{ $aula->id}}" @if ($horario->aula_id ==$aula->id)
                            selected
                            @endif>
                            {{ $aula->grado}} {{ $aula->seccion}}
                        </option>
                        @endforeach
                    </select>
                </div>
                {{-- Seleccionar Día --}}
                <div class="col-md-4">
                    {!! Form::label('dia', 'Dia') !!}
                    {!! Form::select('dia', [1=>'Lunes', 2=>'Martes', 3=>'Miercioles', 4=>'Jueves',
                    5=>'Viernes'], $horario->dia, ['class' => 'custom-select']) !!}
                </div>
            </div>
            {{-- Seleccionar Horas --}}
            <div class="form-group form-row">
                {{-- Seleccionar Hora de Inicio--}}
                <div class="col-sm ">
                    {!! Form::label('hora_i', 'Hora Inicio') !!}
                    {!! Form::time('hora_i', $horario->hora_i, ['class' => 'form-control','format'=>'Y:H']) !!}
                </div>
                {{-- Seleccionar Hora de Fin --}}
                <div class="col-sm">
                    {!! Form::label('hora_f', 'Hora Inicio') !!}
                    {!! Form::time('hora_f', $horario->hora_f, ['class' => 'form-control']) !!}
                </div>
            </div>
            {{-- CURSO - DOCENTES --}}
            <table id="table" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Curso </th>
                        <th>Docente </th>
                    </tr>
                </thead>
                @foreach ($cursos as $curso)
                <tr>
                    <td>
                        {!! Form::radio('curso_id', $curso->id, $horario->curso_id,['class' => 'mr-1']) !!}
                        {{ $curso->ncurso}}
                    </td>
                    <td>
                        <ul class="list-group">
                            @foreach ($curso->docentes as $docente)
                            <li class="list-group-item">
                                <strong>
                                    {!! Form::radio('docente_id', $docente->id, $horario->docente_id,['class' =>
                                    'mr-1']) !!}
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
                {!! Form::submit('editar', ['class' => 'btn btn-success','style'=>'margin-top:1vh;']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
