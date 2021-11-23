@extends('adminlte::page')

@section('title', 'Man. Docentes')

@section('content_header')
<h1>Añadir docente</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            {!! Form::open(['method' => 'POST', 'route' => 'admin.aulas.store']) !!}
            <div class="form-group">
                <div class="row">
                    {{-- Seleccionar Nivel--}}
                    <div class=" form-group col-sm">
                        {!! Form::label('username', 'Nombre de Usuario') !!}
                        {!! Form::text('username', null, ['class' => 'form-control']) !!}
                    </div>
                    {{-- Seleccionar Sexo--}}
                    <div class=" form-group">
                        {!! Form::label('seccion', 'Sexo') !!}
                        {!! Form::select('sexo', [ "m" => 'Masculino',"f" => 'Femenino'], null, ['class' =>
                        'form-control'])
                        !!}
                    </div>
                </div>
                <div class="row">
                    {{-- Seleccionar Nivel--}}
                    <div class=" form-group col-sm">
                        {!! Form::label('dni', 'DNI') !!}
                        {!! Form::number('dni', null, ['class' => 'form-control']) !!}
                    </div>
                    {{-- Seleccionar Nivel--}}
                    <div class=" form-group col-sm">
                        {!! Form::label('ntelefono', 'Número Celular') !!}
                        {!! Form::number('ntelefono', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    {{-- Seleccionar Nivel--}}
                    <div class=" form-group col-sm">
                        {!! Form::label('fnacimiento', 'Fecha de Nacimiento') !!}
                        {!! Form::date('fnacimiento', null, ['class' => 'form-control']) !!}
                    </div>
                    {{-- Seleccionar Nivel--}}
                    <div class=" form-group col-sm">
                        {!! Form::label('edad', 'Edad') !!}
                        {!! Form::number('edad', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            {!! Form::submit('Crear', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
