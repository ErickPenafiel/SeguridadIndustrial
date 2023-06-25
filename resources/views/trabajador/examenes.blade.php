@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Examenes Medicos de {{ $trabajador_datos->nombre . ' ' . $trabajador_datos->apellido }} </h1>
@stop

@section('content')
    <div class="p-2">
        <h2>Subir Documentos</h2>
        <form action="{{ route('examenes.store', $trabajador_datos->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="seleccion" class="form-label">Seleccione sus archivos</label>
            <input class="form-control-file" type="file" name="examenes[]" id="examenes" multiple>
            <input type="submit" value="Enviar" class="btn btn-primary mt-4">
        </form>
    </div>

    <hr>

    <div class="p-2">
        <h2>Fotos del monitoreo registrado</h2>
        <div class="table-responsive">

            <table class="table">
                <tr>
                    <th class="text-center align-middle">Nombre del Archivo</th>
                    <th class="text-center align-middle">Acciones</th>
                </tr>

                @foreach ($trabajador as $examen)
                    <tr>
                        <td class="text-center align-middle">{{ $examen->documento }}</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-success mr-2"
                                href="{{ asset('storage/documents/examenesMedicos/' . $examen->trabajador->nombre . '_' . $examen->trabajador->apellido . '/' . $examen->documento) }}">Ver</a>
                            <form action="{{ route('examenes.destroy', $examen->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>

        <div>
            {{ $trabajador->links() }}
        </div>
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
