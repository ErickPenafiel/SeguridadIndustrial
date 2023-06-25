@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Fotos Monitoreo</h1>
@stop

@section('content')
    <div class="p-2">
        <hr>
        <h2>Cargar Fotos</h2>
        <form action="{{ route('fotoauditoria.store', $auditoria_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="seleccion" class="form-label">Seleccione sus archivos: </label>
            <input class="form-control-file" type="file" name="fotos[]" id="fotos" multiple>
            <input type="submit" value="Enviar" class="btn btn-primary mt-3">
        </form>
    </div>

    <hr>

    <div class="p-2">
        <h2 class="mb-3">Fotos del monitoreo registrado</h2>
        <table class="table">
            <tr>
                <th class="text-center">Nombre del Archivo</th>
                <th class="text-center">Acciones</th>
            </tr>

            @foreach ($auditoria as $auditoriafoto)
                <tr>
                    <td class="text-center">{{ $auditoriafoto->foto }}</td>
                    <td class="d-flex justify-content-center">
                        <a class="btn btn-success mx-2"
                            href="{{ asset('storage/images/fotoauditorias/' . $auditoria_id . '/' . $auditoriafoto->foto) }}">Ver
                            archivo</a>
                        <form action="{{ route('fotoauditoria.destroy', $auditoriafoto->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>

        {{ $auditoria->links() }}
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
