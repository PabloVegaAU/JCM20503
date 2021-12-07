@extends('adminlte::page')

@section('title', 'Man. Docentes')

@section('content_header')
<h1>Editar Docente: {{$docente->nombres}} {{$docente->apellidos}}</h1>
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
                    {{-- Seleccionar Nombres--}}
                    <div class=" form-group col-sm">
                        {!! Form::label('nombres', 'Nombres') !!}
                        {!! Form::text('nombres', $docente->nombres, ['class' => 'form-control']) !!}
                    </div>
                    {{-- Seleccionar Apellidos--}}
                    <div class=" form-group col-sm">
                        {!! Form::label('apellidos', 'Apellidos') !!}
                        {!! Form::text('apellidos', $docente->apellidos, ['class' => 'form-control']) !!}
                    </div>
                    {{-- Seleccionar Sexo--}}
                    <div class=" form-group col-sm">
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
                <div class="row">
                    {{-- Seleccionar Nivel--}}
                    <div class=" form-group col-sm">
                        {!! Form::label('name', 'Usuario') !!}
                        {!! Form::text('name', $docente->user->name, ['class' => 'form-control']) !!}
                    </div>
                    {{-- Seleccionar Nivel--}}
                    <div class=" form-group col-sm">
                        {!! Form::label('password', 'Contraseña') !!}<br>
                        {!! Form::text('password', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group  col-md-6">
                    {!! Form::label('cursos', 'Añadir Cursos') !!}
                    @foreach ($cursos as $curso)
                    <ul class="list-group">
                        <li class="list-group-item">
                            <label for="curso">
                                {!! Form::checkbox('cursos[]', $curso->id, $docente->cursos, ['class' =>
                                'mr-1']) !!} {{$curso->ncurso}}</label>
                        </li>
                    </ul>
                    @endforeach

                </div>
            </div>
            {!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
