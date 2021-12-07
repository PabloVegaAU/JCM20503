@extends('adminlte::page')

@section('title', 'Man. Cursos')

@section('content_header')
<h1>Añadir Curso</h1>
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
            {!! Form::open(['method' => 'POST', 'route' => 'admin.cursos.store']) !!}
            <div class="form-group">
                <div class="row">
                    {{-- Seleccionar Nivel--}}
                    <div class=" form-group col-sm">
                        {!! Form::label('ncurso', 'Nombre del Curso') !!}
                        {!! Form::text('ncurso', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            {!! Form::submit('Crear', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
