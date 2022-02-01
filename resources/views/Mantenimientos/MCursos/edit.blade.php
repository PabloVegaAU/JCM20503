@extends('adminlte::page')

@section('title', 'Man. Cursos')

@section('content_header')
<h1>Editar Curso {{$curso->ncurso}} </h1>
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
            {!! Form::model($curso, ['route' => ['admin.cursos.update', $curso->id], 'method' => 'PUT']) !!}
            <div class="form-group">
                <div class="row">
                    {{-- Seleccionar Nombre del Curso--}}
                    <div class=" form-group col-sm">
                        {!! Form::label('ncurso', 'Nombre del Curso') !!}
                        {!! Form::text('ncurso', $curso->ncurso, ['class' => 'form-control']) !!}
                    </div>
                    {{-- Seleccionar Número de Clases--}}
                    <div class=" form-group col-sm">
                        {!! Form::label('nclases', 'Número de Clases') !!}
                        {!! Form::text('nclases', $curso->nclases, ['class' => 'form-control']) !!}
                    </div>
                    {{-- Seleccionar Año--}}
                    <div class=" form-group col-sm">
                        {!! Form::label('año', 'Año') !!}
                        {!! Form::text('año', $curso->año, ['class' => 'form-control']) !!}
                    </div>
                </div>
                {!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
