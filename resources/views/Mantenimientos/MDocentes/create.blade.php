@extends('adminlte::page')

@section('title', 'Man. Docentes')

@section('content_header')
<h1>Añadir docente</h1>
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
            {!! Form::open(['method' => 'POST', 'route' => 'admin.docentes.store']) !!}
            <div class="form-group">
                <div class="row">
                    {{-- Seleccionar Nivel--}}
                    <div class=" form-group col-sm">
                        {!! Form::label('nombres', 'Nombres') !!}
                        {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class=" form-group col-sm">
                        {!! Form::label('apellidos', 'Apellidos') !!}
                        {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
                    </div>
                    {{-- Seleccionar Sexo--}}
                    <div class=" form-group col-sm">
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
                <div class="row">
                    {{-- Seleccionar Nivel--}}
                    <div class=" form-group col-sm">
                        {!! Form::label('direccion', 'Dirección') !!}
                        {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    {{-- Seleccionar Nivel--}}
                    <div class=" form-group col-sm">
                        {!! Form::label('name', 'Usuario') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class=" form-group col-sm">
                        {!! Form::label('password', 'Contraseña') !!}
                        {!! Form::text('password', null, ['class' => 'form-control','type'=>"password"]) !!}
                    </div>
                </div>
            </div>
            {!! Form::submit('Crear', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
