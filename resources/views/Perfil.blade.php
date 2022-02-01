@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container rounded mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            {{-- En Caso de ERRORES --}}
            <div>
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
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" src="{{ Auth::user()->adminlte_image() }}"
                            alt="{{ Auth::user()->name }}" width="90">
                        @if (Auth::user()->docente)
                        <span class="font-weight-bold">
                            {{ Auth::user()->docente->nombres }} {{ Auth::user()->docente->apellidos }}</span>
                        @else
                        <span class="font-weight-bold">
                            {{ Auth::user()->estudiante->nombres }} {{ Auth::user()->estudiante->apellidos }}</span>
                        @endif
                        <span class="text-black-50">{{ Auth::user()->email }}</span>
                        <span>{{ Auth::user()->name }}</span>

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex flex-row align-items-center back"><i
                                    class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                <h2><strong>Mi Perfil</strong></h2>
                            </div>
                        </div>
                        @if (Auth::user()->docente)
                        {!! Form::model(Auth::user()->docente, ['route' => ['admin.docentes.update',
                        Auth::user()->docente->id], 'class' => 'editar','method' =>'PUT']) !!}
                        {{-- DOCENTE --}}
                        <div class="row mt-2">
                            {{-- Seleccionar Nombres--}}
                            <div class="col-sm">
                                {!! Form::label('nombres', 'Nombres') !!}
                                {!! Form::text('nombres', Auth::user()->docente->nombres, ['class' => 'form-control',
                                'placeholder'=> 'Nombres','disabled']) !!}
                            </div>
                            {{-- Seleccionar Apellidos--}}
                            <div class="col-sm">
                                {!! Form::label('apellidos', 'Apellidos') !!}
                                {!! Form::text('apellidos', Auth::user()->docente->apellidos, ['class' =>
                                'form-control', 'placeholder'=>'Apellidos','disabled']) !!}
                            </div>
                            {{-- Seleccionar Sexo--}}
                            <div class="col-sm">
                                {!! Form::label('sexo', 'Sexo') !!}
                                {!! Form::select('sexo', [ "m" => 'Masculino',"f" => 'Femenino'],
                                Auth::user()->docente->sexo, ['class' =>'form-control','disabled'])!!}
                            </div>
                        </div>
                        <div class="row mt-3">
                            {{-- Seleccionar Apellidos--}}
                            <div class="col-sm">
                                {!! Form::label('dni', 'N° DNI') !!}
                                {!! Form::number('dni', Auth::user()->docente->dni, ['class' =>
                                'form-control', 'placeholder'=>'N° DNI','disabled']) !!}
                            </div>
                            {{-- Seleccionar Celular--}}
                            <div class="col-sm">
                                {!! Form::label('ntelefono', 'N° Celular') !!}
                                {!! Form::number('ntelefono', Auth::user()->docente->ntelefono, ['class' =>
                                'form-control', 'placeholder'=>'N° Celular','disabled']) !!}
                            </div>
                        </div>
                        <div class="row mt-3">
                            {{-- Seleccionar Fecha de Nacimiento--}}
                            <div class="form-group col-sm">
                                {!! Form::label('fnacimiento', 'Fecha de Nacimiento') !!}
                                {!! Form::date('fnacimiento', Auth::user()->docente->fnacimiento, ['class'
                                =>'form-control','disabled']) !!}
                            </div>
                            {{-- Seleccionar Edad--}}
                            <div class="form-group col-sm">
                                {!! Form::label('edad', 'Edad') !!}
                                {!! Form::number('edad', Auth::user()->docente->edad, ['class' => 'form-control',
                                'placeholder'=>'Edad','disabled']) !!}
                            </div>
                        </div>
                        <div class="row mt-3">
                            {{-- Seleccionar Nivel--}}
                            <div class=" form-group col-sm">
                                {!! Form::label('direccion', 'Dirección') !!}
                                {!! Form::text('direccion', Auth::user()->docente->direccion, ['class' =>
                                'form-control','disabled']) !!}
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex flex-row align-items-center back"><i
                                    class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                <h2><strong>Mi Usuario</strong></h2>
                            </div>
                        </div>
                        <div class="row">
                            {{-- Seleccionar Nivel--}}
                            <div class=" form-group col-sm">
                                {!! Form::label('name', 'Usuario') !!}
                                {!! Form::text('name', Auth::user()->name, ['class' => 'form-control'])
                                !!}
                            </div>
                            {{-- Seleccionar Nivel--}}
                            <div class=" form-group col-sm">
                                {!! Form::label('password', 'Contraseña') !!}<br>
                                {!! Form::text('password', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::text('perfil', 'true', ['class' => 'form-control','hidden']) !!}
                    {!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
                    {{-- ESTUDIANTE --}}
                    @else
                    {!! Form::model(Auth::user()->estudiante, ['route' => ['admin.estudiantes.update',
                    Auth::user()->estudiante->user_id], 'class' => 'editar','method' =>'PUT']) !!}
                    <div class="row mt-2">
                        {{-- Seleccionar Nombres--}}
                        <div class="col-sm">
                            {!! Form::label('nombres', 'Nombres') !!}
                            {!! Form::text('nombres', Auth::user()->estudiante->nombres, ['class' => 'form-control',
                            'placeholder'=> 'Nombres','disabled']) !!}
                        </div>
                        {{-- Seleccionar Apellidos--}}
                        <div class="col-sm">
                            {!! Form::label('apellidos', 'Apellidos') !!}
                            {!! Form::text('apellidos', Auth::user()->estudiante->apellidos, ['class' =>
                            'form-control', 'placeholder'=>'Apellidos','disabled']) !!}
                        </div>
                        {{-- Seleccionar Sexo--}}
                        <div class="col-sm">
                            {!! Form::label('sexo', 'Sexo') !!}
                            {!! Form::select('sexo', [ "m" => 'Masculino',"f" => 'Femenino'],
                            Auth::user()->estudiante->sexo, ['class' =>'form-control','disabled'])!!}
                        </div>
                    </div>
                    <div class="row mt-3">
                        {{-- Seleccionar Apellidos--}}
                        <div class="col-sm">
                            {!! Form::label('dni', 'N° DNI') !!}
                            {!! Form::number('dni', Auth::user()->estudiante->dni, ['class' =>
                            'form-control', 'placeholder'=>'N° DNI','disabled']) !!}
                        </div>
                        {{-- Seleccionar Celular--}}
                        <div class="col-sm">
                            {!! Form::label('ntelefono', 'N° Celular') !!}
                            {!! Form::number('ntelefono', Auth::user()->estudiante->ntelefono, ['class' =>
                            'form-control', 'placeholder'=>'N° Celular','disabled']) !!}
                        </div>
                    </div>
                    <div class="row mt-3">
                        {{-- Seleccionar Fecha de Nacimiento--}}
                        <div class="form-group col-sm">
                            {!! Form::label('fnacimiento', 'Fecha de Nacimiento') !!}
                            {!! Form::date('fnacimiento', Auth::user()->estudiante->fnacimiento, ['class'
                            =>'form-control','disabled']) !!}
                        </div>
                        {{-- Seleccionar Edad--}}
                        <div class="form-group col-sm">
                            {!! Form::label('edad', 'Edad') !!}
                            {!! Form::number('edad', Auth::user()->estudiante->edad, ['class' => 'form-control',
                            'placeholder'=>'Edad','disabled']) !!}
                        </div>
                    </div>
                    <div class="row mt-3">
                        {{-- Seleccionar Nivel--}}
                        <div class=" form-group col-sm">
                            {!! Form::label('direccion', 'Dirección') !!}
                            {!! Form::text('direccion', Auth::user()->estudiante->direccion, ['class' =>
                            'form-control','disabled']) !!}
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back"><i
                                class="fa fa-long-arrow-left mr-1 mb-1"></i>
                            <h2><strong>Mi Usuario</strong></h2>
                        </div>
                    </div>
                    <div class="row">
                        {{-- Seleccionar Nivel--}}
                        <div class=" form-group col-sm">
                            {!! Form::label('name', 'Usuario') !!}
                            {!! Form::text('name', Auth::user()->name, ['class' => 'form-control'])
                            !!}
                        </div>
                        {{-- Seleccionar Nivel--}}
                        <div class=" form-group col-sm">
                            {!! Form::label('password', 'Contraseña') !!}<br>
                            {!! Form::text('password', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::text('perfil', 'true', ['class' => 'form-control','hidden']) !!}
                {!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>
</div>
</div>
@stop

@section('js')
{{-- FORMULARIO EDITAR --}}
<script>
    $('.editar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro de editar tus datos?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, estoy de acuerdo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
</script>0.
{{-- MENSAJE DESPUES DE EDITAR --}}
@if (session('mensaje') == 'ok')
<script>
    Swal.fire(
                'Datos actualizados!',
                'Has Actualizado tus tados',
                'success'
            )
</script>
@endif
@stop
