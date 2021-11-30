@extends('adminlte::page')

@section('title', 'Man. Docentes')

@section('content_header')
<h1>Editar Docente: {{$docente->username}}</h1>
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
            {!! Form::model($docente, ['route' => ['admin.docentes.update', $docente->id], 'method' => 'PUT']) !!}
            <div class="form-group">
                <div class="row">
                    {{-- Seleccionar Nivel--}}
                    <div class=" form-group col-md-8">
                        {!! Form::label('username', 'Nombre de Usuario') !!}
                        {!! Form::text('username', $docente->username, ['class' => 'form-control']) !!}
                    </div>
                    {{-- Seleccionar Sexo--}}
                    <div class=" form-group col-md">
                        {!! Form::label('seccion', 'Sexo') !!}
                        {!! Form::select('sexo', [ "m" => 'Masculino',"f" => 'Femenino'], $docente->sexo, ['class' =>
                        'form-control'])
                        !!}
                    </div>
                </div>
                <div class="row">
                    {{-- Seleccionar Nivel--}}
                    <div class="form-group col-sm">
                        {!! Form::label('dni', 'DNI') !!}
                        {!! Form::number('dni', $docente->dni, ['class' => 'form-control']) !!}
                    </div>
                    {{-- Seleccionar Nivel--}}
                    <div class="form-group col-sm">
                        {!! Form::label('ntelefono', 'Número Celular') !!}
                        {!! Form::number('ntelefono', $docente->ntelefono, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    {{-- Seleccionar Nivel--}}
                    <div class="form-group col-sm">
                        {!! Form::label('fnacimiento', 'Fecha de Nacimiento') !!}
                        {!! Form::date('fnacimiento', $docente->fnacimiento, ['class' => 'form-control']) !!}
                    </div>
                    {{-- Seleccionar Nivel--}}
                    <div class="form-group col-sm">
                        {!! Form::label('edad', 'Edad') !!}
                        {!! Form::number('edad', $docente->edad, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    {{-- Seleccionar Nivel--}}
                    <div class=" form-group col-sm">
                        {!! Form::label('direccion', 'Dirección') !!}
                        {!! Form::text('direccion', $docente->direccion, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            {!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
