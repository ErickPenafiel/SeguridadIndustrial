@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Fotos Monitoreo</h1>
@stop

@section('content')
    <div class="p-2">
        <h2>Cargar Fotos</h2>
        <form action="{{ route('fotomonitoreo.store', $monitoreo_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="seleccion" class="form-label">Seleccione sus archivos</label>
            <input class="form-control-file" type="file" name="fotos[]" id="fotos" multiple>
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

                @foreach ($monitoreo as $fotoMonitoreo)
                    <tr>
                        <td class="text-center align-middle">{{ $fotoMonitoreo->foto }}</td>
                        <td class="d-flex justify-content-center align-items-center">
                            <a class="btn btn-success mr-2"
                                href="{{ asset('storage/images/fotomonitoreos/' . $monitoreo_id . '/' . $fotoMonitoreo->foto) }}">Ver</a>
                            <form action="{{ route('fotomonitoreo.destroy', $fotoMonitoreo->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class="p-2">
        {{ $monitoreo->links() }}
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
