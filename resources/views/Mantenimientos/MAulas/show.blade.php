@extends('adminlte::page')

@section('title', 'Man. Aulas')

@section('content_header')
    <h1>Los estudiantes del aula N°{{$id}}</h1>
@stop

@section('content')
    <div class="table-responsive" style="width: 100%;">
        <table id="example" class="table table-hover" style="font-size: 95%">
            <thead>
                <tr class="bg-primary">
                    <th scope="col">Nombres Completos</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Dni</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Dirección</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estudiantes as $estudiante)
                    <tr>
                        <td>{{ $estudiante->username }}</td>
                        <td>
                            @if ($estudiante->sexo == 'm')
                                Masculino
                            @else
                                Femenino
                            @endif
                        </td>
                        <td>{{ $estudiante->dni }}</td>
                        <td>{{ $estudiante->edad }}</td>
                        <td>{{ $estudiante->fnacimiento }}</td>
                        <td>{{ $estudiante->ntelefono }}</td>
                        <td>{{ $estudiante->direccion }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="bg-primary">
                    <th scope="col">Nombres Completos</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Dni</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Dirección</th>
                </tr>
            </tfoot>
        </table>
    </div>
@stop

@section('css')
@stop

@section('js')
    {{-- DataTable --}}
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                }
            });
        });
    </script>
@stop
