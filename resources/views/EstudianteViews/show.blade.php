@extends('adminlte::page')

@section('title')

@section('content_header')
<h1 class="text-uppercase"></h1>
@stop

@section('content')
<div class="container">
    {{-- MOSTRAR CURSO Y DOCENTE --}}
    <div class="card">
        <div class="card-header">
            <div class="row text-uppercase">
                <div class="col-sm">
                    Curso: {{$curso->ncurso}}
                </div>
                <div class="col-sm">
                    Docente: {{$docente->nombres}} {{$docente->apellidos}}
                </div>
            </div>
        </div>
    </div>
    {{-- MOSTRAR DOCUMENTOS --}}
    @for($i=1;$i<=$curso->nclases;$i++)
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
                                @if (($recurso->momento=="A") && ($recurso->docente_id ==
                                $recurso->docente_id)&&
                                ($recurso->curso_id == $horario->curso_id) && ($recurso->nclase ==$i))
                                <div class="card">
                                    <a href="{{ route('recurso.show', $recurso->id) }}">
                                        <div class="card-header">
                                            {{$recurso->nrecurso}}
                                        </div>
                                    </a>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        {{-- DURANTE --}}
                        <div class="card-header">
                            Durante
                        </div>
                        <div class="card-body">
                            <div class="card-columns">
                                @foreach ($recursos as $recurso)
                                @if (($recurso->momento=="D") && ($recurso->docente_id ==
                                $docente->id)&&
                                ($recurso->curso_id == $horario->curso_id) && ($recurso->nclase ==$i))
                                <div class="card">
                                    <div class="card-header">
                                        <a href="{{ route('recurso.show', $recurso->id) }}">{{$recurso->nrecurso}}</a>
                                    </div>
                                    <div class="card-body">
                                        {{$recurso->nrecurso}}
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        {{-- AL FINALIZAR --}}
                        <div class="card-header">
                            Al finalizar
                        </div>
                        <div class="card-body">
                            <div class="card-columns">
                                @foreach ($recursos as $recurso)
                                @if (($recurso->momento=="F") && ($recurso->docente_id ==
                                $recurso->docente_id)&&
                                ($recurso->curso_id == $horario->curso_id) && ($recurso->nclase ==$i))
                                <div class="card">
                                    <div class="card-header">
                                        <a href="{{ route('recurso.show', $recurso->id) }}">{{$recurso->nrecurso}}</a>
                                    </div>
                                    <div class="card-body">
                                        {{$recurso->nrecurso}}
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endfor
</div>
@stop
