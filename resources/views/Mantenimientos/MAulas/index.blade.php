@extends('adminlte::page')

@section('title', 'Man. Aulas')

@section('content_header')
    <h1>Mantenimiento de Aulas</h1>
@stop

@section('content')
    <div class="table-responsive" style="width: 100%;">
        <table id="example" class="table table-hover" style="font-size: 95%;">
            <thead>
                <tr class="bg-primary">
                    <th scope="col">N°</th>
                    <th scope="col">Nivel</th>
                    <th scope="col">Grado</th>
                    <th scope="col">Sección</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aulas as $aula)
                    <tr>
                        <th scope="row">{{ $aula->id }}</td>
                        <td>{{ $aula->nivel }}</td>
                        <td>{{ $aula->grado }}</td>
                        <td>{{ $aula->seccion }}</td>
                        <td style="display:flex;justify-content: space-between">
                            <a href="{{ route('admin.aulas.show', $aula->id) }}" class="btn btn-warning"
                                style="font-size: 95%">Estudiantes</a>
                            <a href="{{ route('admin.aulas.edit', $aula) }}" class="btn btn-success"
                                style="font-size: 95%">Editar</a>
                            <form action="{{ route('admin.aulas.destroy', $aula->id) }}" method="post"
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
                    <th scope="col">Nivel</th>
                    <th scope="col">Grado</th>
                    <th scope="col">Sección</th>
                    <th scope="col">Acciones</th>
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
    {{-- FORMULARIO ELIMINAR aula --}}
    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                text: "Se eliminaran todos los registros relacionados a esta aula. Esta acción es irreversible.",
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
