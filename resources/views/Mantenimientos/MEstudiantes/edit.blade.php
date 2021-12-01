@extends('adminlte::page')

@section('title', 'Man. estudiantes')

@section('content_header')
<h1>Editar estudiante: {{$estudiante->username}}</h1>
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
            {!! Form::model($estudiante, ['route' => ['admin.estudiantes.update', $estudiante->user_id], 'method' =>
            'PUT'])
            !!}
            <div class="form-group">
                <div class="row">
                    {{-- Seleccionar Nivel--}}
                    <div class=" form-group col-md-8">
                        {!! Form::label('username', 'Nombre de Usuario') !!}
                        {!! Form::text('username', $estudiante->username, ['class' => 'form-control']) !!}
                    </div>
                    {{-- Seleccionar Sexo--}}
                    <div class=" form-group col-md">
                        {!! Form::label('seccion', 'Sexo') !!}
                        {!! Form::select('sexo', [ "m" => 'Masculino',"f" => 'Femenino'], $estudiante->sexo, ['class' =>
                        'form-control'])
                        !!}
                    </div>
                </div>
                <div class="row">
                    {{-- Seleccionar Nivel--}}
                    <div class="form-group col-sm">
                        {!! Form::label('dni', 'DNI') !!}
                        {!! Form::number('dni', $estudiante->dni, ['class' => 'form-control']) !!}
                    </div>
                    {{-- Seleccionar Nivel--}}
                    <div class="form-group col-sm">
                        {!! Form::label('ntelefono', 'Número Celular') !!}
                        {!! Form::number('ntelefono', $estudiante->ntelefono, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    {{-- Seleccionar Nivel--}}
                    <div class="form-group col-sm">
                        {!! Form::label('fnacimiento', 'Fecha de Nacimiento') !!}
                        {!! Form::date('fnacimiento', $estudiante->fnacimiento, ['class' => 'form-control']) !!}
                    </div>
                    {{-- Seleccionar Nivel--}}
                    <div class="form-group col-sm">
                        {!! Form::label('edad', 'Edad') !!}
                        {!! Form::number('edad', $estudiante->edad, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    {{-- Seleccionar Nivel--}}
                    <div class=" form-group col-sm">
                        {!! Form::label('direccion', 'Dirección') !!}
                        {!! Form::text('direccion', $estudiante->direccion, ['class' => 'form-control']) !!}
                    </div>
                </div>
                {{$estudiante->users}}
                <div class="row">
                    {{-- Seleccionar Nivel--}}
                    <div class=" form-group col-sm">
                        {!! Form::label('name', 'Usuario') !!}
                        {!! Form::text('name', $estudiante->user->name, ['class' => 'form-control']) !!}
                    </div>
                    <div class=" form-group col-sm">
                        {!! Form::label('password', 'Contraseña') !!}
                        {!! Form::text('password', null, ['class' =>'form-control','type'=>"password"]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('aulas', 'Aulas') !!}
                    <div class="table-responsive">
                        <table id="aulas" class="table table-hover table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Grado y Sección</th>
                                    <th scope="col">Nivel</th>
                                    <th scope="col">Turno</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aulas as $aula)
                                <tr>
                                    <th scope="row">
                                        {!! Form::radio('aula_id', $aula->id, $estudiante->aula,['class' =>
                                        'mr-1']) !!}
                                    </th>
                                    <td>
                                        @if ($aula->grado =='1')
                                        1ro {{$aula->seccion}}
                                        @elseif ($aula->grado =='2')
                                        2do {{$aula->seccion}}
                                        @elseif ($aula->grado =='3')
                                        3ro {{$aula->seccion}}
                                        @elseif ($aula->grado =='4')
                                        4to {{$aula->seccion}}
                                        @elseif ($aula->grado =='5')
                                        5to {{$aula->seccion}}
                                        @elseif ($aula->grado =='6')
                                        6to {{$aula->seccion}}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($aula->nivel =='p')
                                        Primaria
                                        @else
                                        Secundaria
                                        @endif
                                    </td>
                                    <td>
                                        @if ($aula->turno =='m')
                                        Mañana
                                        @else
                                        Tarde
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Grado y Sección</th>
                                    <th scope="col">Nivel</th>
                                    <th scope="col">Turno</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            {!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop
