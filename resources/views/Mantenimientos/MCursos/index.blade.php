@extends('adminlte::page')

@section('title', 'Man. Cursos')

@section('content_header')
<h1>Mantenimiento de Cursos</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive" style="width: 100%;">
                <table id="table" class="table table-hover" style="font-size: 95%;">
                    <thead>
                        <tr class="bg-primary">
                            <th scope="col">N°</th>
                            <th scope="col">Curso</th>
                            <th scope="col">Año</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cursos as $curso)
                        <tr>
                            <th scope="row">{{ $curso->id }}</th>
                            <td>{{ $curso->ncurso }}</td>
                            <td>{{ $curso->año }}</td>
                            <td style="display:flex;justify-content: space-between">
                                <!-- Button trigger modal -->
                                <button class="btn btn-warning" data-toggle="modal"
                                    data-target="#exampleModal{{$curso->id}}" style="font-size: 95%">Docentes</button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$curso->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            {{-- MODAL BODY --}}
                                            <div class="modal-body">
                                                <div class="card text-center">
                                                    <ul class="list-group">
                                                        <li class="list-group-item active">
                                                            <strong>
                                                                Docentes
                                                            </strong>
                                                        </li>
                                                        @foreach ($curso->docentes as $cd)
                                                        <li class="list-group-item">
                                                            <strong>
                                                                {{ $cd->nombres }} {{$cd->apellidos }}
                                                            </strong>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- EDITAR -->
                                <a href="{{ route('admin.cursos.edit', $curso->id) }}" class="btn btn-success"
                                    style="font-size: 95%">Editar</a>
                                <!-- ELIMINIAR -->
                                <form action="{{ route('admin.cursos.destroy', $curso->id) }}" method="post"
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
                            <th scope="col">Año</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
{{-- DataTable --}}
<script>
    $(document).ready(function() {
            $('#table').DataTable({
                language: {
                    "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                }
            });
        });
</script>
{{-- FORMULARIO ELIMINAR CURSO --}}
<script>
    $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                text: "Se eliminaran todos los registros relacionados a este curso. Esta acción es irreversible.",
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
</script>
{{-- MENSAJE DESPUES DE ELIMINAR --}}
@if (session('mensaje') == 'ok')
<script>
    Swal.fire(
                'Eliminado!',
                'El curso se ha eliminado correctamente.',
                'error'
            )
</script>
@endif
{{-- MENSAJE DESPUES DE AÑADIR NUEVO --}}
@if (session('mensaje') == 'new')
<script>
    Swal.fire(
                'Añadido!',
                'El curso se ha añadido correctamente.',
                'success'
            )
</script>
@endif
@stop
