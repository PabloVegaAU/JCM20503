@extends('layouts.app')

@section('content')
<div class="container mt-1">
    <div class="card col-md-6 mx-auto">
        <div class="card-header">{{ __('Register')}}</div>
        <div class="card-body ">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                {{-- USERNAME --}}
                <div class="mb-3 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 col-form-label">
                        {{ __('Username')}}
                    </label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                            autofocus>

                        @if ($errors->has('name'))
                        <span class="text-danger fs-6">
                            {{ $errors->first('name') }}
                        </span>
                        @endif
                    </div>
                </div>
                {{-- NOMBRE Y APELLIDO --}}
                <div class="row">
                    {{-- NOMBRE --}}
                    <div class="col-md-6 mb-3 form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                        <label for="nombre" class="col-form-label">
                            {{ __('Name')}}
                        </label>
                        <div class="col-auto">
                            <input id="nombre" type="text" class="form-control" name="nombre"
                                value="{{ old('nombre') }}" required autofocus>

                            @if ($errors->has('nombre'))
                            <span class="text-danger text-fs6">
                                {{ $errors->first('nombre') }}
                            </span>
                            @endif
                        </div>
                    </div>
                    {{-- APELLIDO --}}
                    <div class="col-md-6 mb-3 form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                        <label for="apellido" class="col-form-label">
                            {{ __('Surname')}}
                        </label>

                        <div class="col-auto">
                            <input id="apellido" type="text" class="form-control" name="apellido"
                                value="{{ old('apellido') }}" required autofocus>

                            @if ($errors->has('apellido'))
                            <span class="text-danger text-fs6">
                                {{ $errors->first('apellido') }}
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- DNI Y EMAIL --}}
                <div class="row">
                    {{-- NÚMERO DE DNI --}}
                    <div class="col-md-4 mb-3 form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                        <label for="dni" class="col-form-label">
                            {{ __('N° DNI')}}
                        </label>

                        <div class="col-auto">
                            <input id="dni" type="text" class="form-control" name="dni" value="{{ old('dni') }}"
                                required autofocus>

                            @if ($errors->has('dni'))
                            <span class="text-danger text-fs6">
                                {{ $errors->first('dni') }}
                            </span>
                            @endif
                        </div>
                    </div>
                    {{-- EMAIL --}}
                    <div class="col-md-8 mb-3 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-form-label">
                            {{ __('E-Mail Address')}}
                        </label>

                        <div class="col-auto">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                required>

                            @if ($errors->has('email'))
                            <span class="text-danger text-fs6">
                                {{ $errors->first('email') }}
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- CONTRASEÑA Y CONFIRMACIÓN --}}
                <div class="row">
                    {{-- CONTRASEÑA --}}
                    <div class="col-md-6 mb-3 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-auto col-form-label mb-2">
                            {{ __('Password')}}
                        </label>

                        <div class="col-auto">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                            <span class="text-danger text-fs6">
                                {{ $errors->first('password') }}
                            </span>
                            @endif
                        </div>
                    </div>
                    {{-- CONFIRMAR CONTRASEÑA --}}
                    <div class="col-md-6 mb-3 form-group">
                        <label for="password-confirm" class="col-auto col-form-label mb-2">
                            {{ __('Confirm Password')}}
                        </label>
                        {{-- ? --}}
                        <span class="text-nowrap" data-bs-toggle="popover" data-bs-trigger="hover focus"
                            data-bs-content="Debe contener mayusculas, minusculas y un simbolo, min 8">
                            <button class="btn btn-primary text-nowrap" type="button" disabled>?</button>
                        </span>

                        <div class="col-auto">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required>
                        </div>
                    </div>
                </div>
                {{-- ELEGIR PREGUNTA --}}
                <div class="col-md-12 mb-3 form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                    <label for="dni" class="col-auto col-form-label">
                        {{ __('Question to password')}}
                    </label>
                    <div class="row">
                        <div class="col-md-12 col-form-label">
                            <select class="form-control col-md-12" id="inputGroupSelect01" required>
                                <option selected disabled value="">Opciones...</option>
                                <option value="0">¿Nombre de la Primera mascota?</option>
                                <option value="1">¿Nombre de la ciudad natal?</option>
                                <option value="2">¿Nombre del mejor amigo de la infancia?</option>
                            </select>
                        </div>
                        <div class="col-md-12 col-form-label">
                            <input id="answer" type="text" class="form-control" name="answer" placeholder="Respuesta..."
                                value="{{ old('answer') }}" required autofocus>

                            @if ($errors->has('answer'))
                            <span class="text-danger text-fs6">
                                {{ $errors->first('answer') }}
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- BOTON DE REGISTRO --}}
                <div class=" col-md-12 mb-3 ">
                    <button type="submit" class="btn btn-primary ">
                        {{ __('Register')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- SCRIPT --}}
<script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})
var popover = new bootstrap.Popover(document.querySelector('.popover-dismiss'), {
  trigger: 'focus'
})
</script>

@endsection