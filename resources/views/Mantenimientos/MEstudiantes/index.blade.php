@extends('adminlte::page')

@section('title', 'Man. Estudiantes')

@section('content_header')
<h1>Mantenimiento de Estudiantes</h1>
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
                    @foreach ($estudiantes as $estudiante)
                    <tr>
                        <td>{{ $estudiante->nombres }} {{ $estudiante->apellidos }}</td>
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
                        <td style="display:flex">
                            <a href="" class="btn btn-warning" style="font-size: 95%">Ver</a>
                            <a href="{{ route('admin.estudiantes.edit', $estudiante->user_id) }}"
                                class="btn btn-success" style="font-size: 95%">Editar</a>

                            <form action="{{ route('admin.estudiantes.destroy', $estudiante) }}" method="post"
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
{{-- FORMULARIO ELIMINAR ESTUDIANTE --}}
<script>
    $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                text: "Se eliminaran todos los registros relacionados a este estudiante. Esta acción es irreversible.",
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
