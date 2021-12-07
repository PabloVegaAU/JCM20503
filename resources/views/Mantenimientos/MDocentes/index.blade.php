@extends('adminlte::page')

@section('title', 'Man. Docentes')

@section('content_header')
<h1>Mantenimiento de Docentes</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body table-responsive" style="width: 100%;">
            <table id="example" class="table table-hover" style="font-size: 90%">
                <thead>
                    <tr class="bg-primary">
                        <th scope="col">Nombres Completos</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Dni</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Fecha de nacimiento</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($docentes as $docente)
                    <tr>
                        <td>{{ $docente->nombres }} {{ $docente->apellidos }}</td>
                        <td>
                            @if ($docente->sexo == 'm')
                            Masculino
                            @else
                            Femenino
                            @endif
                        </td>
                        <td>{{ $docente->dni }}</td>
                        <td>{{ $docente->edad }}</td>
                        <td>{{ $docente->fnacimiento }}</td>
                        <td>{{ $docente->ntelefono }}</td>
                        <td>{{ $docente->direccion }}</td>
                        <td style="display:flex">
                            <!-- Button trigger modal -->
                            <button class="btn btn-warning" data-toggle="modal"
                                data-target="#exampleModal{{$docente->id}}"
                                style="font-size: 90%;margin-right: 1vh">Cursos</button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$docente->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        {{-- <div class="modal-header">
                                            h3 class="modal-title" id="exampleModalLabel">Docn</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div> --}}
                                        {{-- MODAL BODY --}}
                                        <div class="modal-body">
                                            <div class="card text-center">
                                                <ul class="list-group">
                                                    <li class="list-group-item active">
                                                        <strong>
                                                            Cursos
                                                        </strong>
                                                    </li>
                                                    @foreach ($docente->cursos as $cd)
                                                    <li class="list-group-item">
                                                        <strong>
                                                            {{ $cd->ncurso }}
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
                            <a href="{{ route('admin.docentes.edit', $docente) }}" class="btn btn-success"
                                style="font-size: 90%">Editar</a>
                            <form action="{{ route('admin.docentes.destroy', $docente) }}" method="post"
                                class="formulario-eliminar">
                                @csrf
                                @method('DELETE')
                                <input type="submit" id="delete" value="Eliminar" class="btn btn-danger"
                                    style="margin-left:1vh;font-size: 90%">
                            </form>
                        </td>
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
                        <th scope="col">Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
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
{{-- FORMULARIO ELIMINAR docente --}}
<script>
    $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                text: "Se eliminaran todos los registros relacionados a este docente. Esta acción es irreversible.",
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
                'El usuario se ha eliminado correctamente.',
                'success'
            )
</script>
@endif
@stop
