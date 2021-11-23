@extends('adminlte::page')

@section('title', 'Man. Aulas')

@section('content_header')
<h1>Mantenimiento de Aulas</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            {!! Form::open(['method' => 'POST', 'route' => 'admin.aulas.store']) !!}
            <div class="form-group">
                {{-- Seleccionar Nivel--}}
                <div class=" form-group">
                    {!! Form::label('nivel', 'Nivel') !!}
                    {!! Form::select('nivel', [ "p" => 'Primaria',"s" => 'Secundaria' ], null, ['class' =>
                    'form-control'])
                    !!}
                </div>
                {{-- Seleccionar Grado--}}
                <div class=" form-group">
                    {!! Form::label('grado', 'Grado') !!}
                    {!! Form::select('grado', [ 1 => '1ro',2 => '2do',3 => '3ro',4 => '4to',5 => '5to',6 => '6to' ],
                    null, ['class' => 'form-control']) !!}
                </div>
                {{-- Seleccionar Sección--}}
                <div class=" form-group">
                    {!! Form::label('seccion', 'Sección') !!}
                    {!! Form::select('seccion', [ "a" => 'A',"b" => 'B',"c" => 'C' ], null, ['class' => 'form-control'])
                    !!}
                </div>
                {{-- Seleccionar Turno--}}
                <div class=" form-group">
                    {!! Form::label('turno', 'Turno') !!}
                    {!! Form::select('grado', [ "m" => 'Mañana',"t" => 'Tarde' ], null, ['class' => 'form-control']) !!}
                </div>
            </div>
            {!! Form::submit('Crear', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
