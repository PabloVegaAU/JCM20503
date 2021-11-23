@extends('adminlte::page')

@section('title', 'Man. Cursos')

@section('content_header')
    <h1>Mantenimiento de Cursos</h1>
@stop

@section('content')
    <div class="table-responsive" style="width: 100%;">
        <table id="example" class="table table-hover" style="font-size: 95%;">
            <thead>
                <tr class="bg-primary">
                    <th scope="col">N°</th>
                    <th scope="col">Curso</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cursos as $curso)
                    <tr>
                        <th scope="row">{{ $curso->id }}</td>
                        <td>{{ $curso->ncurso }}</td>
                        <td style="display:flex;justify-content: space-between">
                            <a href="{{ route('admin.cursos.show', $curso) }}" class="btn btn-warning"
                                style="font-size: 95%">Estudiantes</a>
                            <a href="{{ route('admin.cursos.edit', $curso) }}" class="btn btn-success"
                                style="font-size: 95%">Editar</a>
                            <form action="{{ route('admin.cursos.destroy', $curso) }}" method="post"
                                class="formulario-eliminar">
                                @csrf
                                @method('DELETE')
                                <input type="submit" id="delete" value="Eliminar" class="btn btn-danger"
                                    style="margin: 0px 0px 0px 5px;font-size: 95%">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="bg-primary">
                    <th scope="col">N°</th>
                    <th scope="col">Curso</th>
                </tr>
            </tfoot>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
