@extends('adminlte::page')

@section('title')

@section('content_header')
<h1 class="text-uppercase">Curso: {{$horarios->curso->ncurso}} </h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@stop

@section('content')
<div class="container">
    @for ($i=1;$i<=$horarios->curso->nclases;$i++)
        <div class="card">
            <div class="nav flex-column nav-pills" id="v-pills-tab{{$i}}" role="tablist" aria-orientation="vertical">
                <a class="nav-link card-header" id="v-pills-{{$i}}-tab" data-toggle="pill" href="#v-pills-{{$i}}"
                    role="tab" aria-controls="v-pills-{{$i}}" aria-selected="false">
                    Clase N°: {{$i}}
                </a>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade" id="v-pills-{{$i}}" role="tabpanel" aria-labelledby="v-pills-{{$i}}-tab">
                    <div class="card-body">
                        {{-- ANTES --}}
                        <div class="card-header">
                            Antes
                        </div>
                        <div class="card-body">
                            <div class="card-columns">
                                @foreach ($recursos as $recurso)
                                @if (($recurso->momento=="A") && ($recurso->docente_id == Auth::user()->docente->id)&&
                                ($recurso->curso_id == $horarios->curso_id) && ($recurso->nclase ==$i))
                                <div class="card">
                                    <a href="{{ route('recurso.show', $recurso->id) }}">
                                        <div class="card-header">
                                            <div class="text-center">{{$recurso->nrecurso}}</div>
                                            <!-- ELIMINIAR -->
                                            <form action="{{ route('recurso.destroy', $recurso->id) }}" method="post"
                                                class="formulario-eliminar text-center">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" id="delete" value="Eliminar" class="btn btn-danger"
                                                    style="font-size: 80%">
                                            </form>
                                        </div>
                                    </a>
                                </div>
                                @endif
                                @endforeach
                                <div class="card">
                                    <div class="card-body">
                                        {!! Form::open(['method' => 'POST', 'route' => 'recurso.store',
                                        'enctype'=>'multipart/form-data'])!!}
                                        @csrf
                                        <div class="form-group">
                                            {{-- COLOCAR HORARIO --}}
                                            {{ Form::hidden('horario_id',$horarios->id) }}
                                            {{-- COLOCAR NOMBRE DEL CURSO --}}
                                            {{ Form::hidden('curso_id',$horarios->curso->id) }}
                                            {{-- COLOCAR N° DE CLASE --}}
                                            {{ Form::hidden('nclase',$i) }}
                                            {{-- COLOCAR ARCHIVO --}}
                                            <div class="form-group">
                                                Nombre del recurso {!! Form::text('nrecurso', '', ['class' =>
                                                'form-control','required'])!!}
                                                {!! Form::file('recurso',['class'=>'recurso w-100','accept' =>
                                                'application/pdf','required'])!!}
                                            </div>
                                            {{-- COLOCAR MOMENTO --}}
                                            {{ Form::hidden('momento',"A") }}
                                        </div>
                                        @error('recurso')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                        {!! Form::submit('Subir Documento', ['class' => 'btn btn-success']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- DURANTE --}}
                        <div class="card-header">
                            Durante
                        </div>
                        <div class="card-body">
                            <div class="card-columns">
                                @foreach ($recursos as $recurso)
                                @if (($recurso->momento=="D") && ($recurso->docente_id == Auth::user()->docente->id)&&
                                ($recurso->curso_id == $horarios->curso_id) && ($recurso->nclase ==$i))
                                <div class="card">
                                    <a href="{{ route('recurso.show', $recurso->id) }}">
                                        <div class="card-header">
                                            <div class="text-center">{{$recurso->nrecurso}}</div>
                                            <!-- ELIMINIAR -->
                                            <form action="{{ route('recurso.destroy', $recurso->id) }}" method="post"
                                                class="formulario-eliminar text-center">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" id="delete" value="Eliminar" class="btn btn-danger"
                                                    style="font-size: 80%">
                                            </form>
                                        </div>
                                    </a>
                                </div>
                                @endif
                                @endforeach
                                <div class="card">
                                    <div class="card-body">
                                        {!! Form::open(['method' => 'POST', 'route' => 'recurso.store',
                                        'enctype'=>'multipart/form-data'])!!}
                                        @csrf
                                        <div class="form-group">
                                            {{-- COLOCAR HORARIO --}}
                                            {{ Form::hidden('horario_id',$horarios->id) }}
                                            {{-- COLOCAR NOMBRE DEL CURSO --}}
                                            {{ Form::hidden('curso_id',$horarios->curso->id) }}
                                            {{-- COLOCAR N° DE CLASE --}}
                                            {{ Form::hidden('nclase',$i) }}
                                            {{-- COLOCAR ARCHIVO --}}
                                            <div class="form-group">
                                                Nombre del recurso {!! Form::text('nrecurso', '', ['class' =>
                                                'form-control'])!!}
                                                {!! Form::file('recurso',['class'=>'recurso w-100','accept' =>
                                                'application/pdf','required'])!!}
                                            </div>
                                            {{-- COLOCAR MOMENTO --}}
                                            {{ Form::hidden('momento',"D") }}
                                        </div>
                                        {!! Form::submit('Subir Documento', ['class' => 'btn btn-success']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- AL FINALIZAR --}}
                        <div class="card-header">
                            Al finalizar
                        </div>
                        <div class="card-body">
                            <div class="card-columns">
                                @foreach ($recursos as $recurso)
                                @if (($recurso->momento=="F") && ($recurso->docente_id == Auth::user()->docente->id)&&
                                ($recurso->curso_id == $horarios->curso_id) && ($recurso->nclase ==$i))
                                <div class="card">
                                    <a href="{{ route('recurso.show', $recurso->id) }}">
                                        <div class="card-header">
                                            <div class="text-center">{{$recurso->nrecurso}}</div>
                                            <!-- ELIMINIAR -->
                                            <form action="{{ route('recurso.destroy', $recurso->id) }}" method="post"
                                                class="formulario-eliminar text-center">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" id="delete" value="Eliminar" class="btn btn-danger"
                                                    style="font-size: 80%">
                                            </form>
                                        </div>
                                    </a>
                                </div>
                                @endif
                                @endforeach
                                <div class="card">
                                    <div class="card-body">
                                        {!! Form::open(['method' => 'POST', 'route' => 'recurso.store',
                                        'enctype'=>'multipart/form-data'])!!}
                                        @csrf
                                        <div class="form-group">
                                            {{-- COLOCAR HORARIO --}}
                                            {{ Form::hidden('horario_id',$horarios->id) }}
                                            {{-- COLOCAR NOMBRE DEL CURSO --}}
                                            {{ Form::hidden('curso_id',$horarios->curso->id) }}
                                            {{-- COLOCAR N° DE CLASE --}}
                                            {{ Form::hidden('nclase',$i) }}
                                            {{-- COLOCAR ARCHIVO --}}
                                            <div class="form-group">
                                                Nombre del recurso {!! Form::text('nrecurso', '', ['class' =>
                                                'form-control'])!!}
                                                {!! Form::file('recurso',['class'=>'recurso w-100','accept' =>
                                                'application/pdf','required'])!!}
                                            </div>
                                            {{-- COLOCAR MOMENTO --}}
                                            {{ Form::hidden('momento',"F") }}
                                        </div>
                                        {!! Form::submit('Subir Documento', ['class' => 'btn btn-success']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endfor
</div>

@stop

@section('js')
@if (session('mensaje') == 'ok')
<script>
    Swal.fire(
                'Añadido!',
                'El recurso se ha añadido correctamente.',
                'success'
            )
</script>
@endif
@stop
