@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Listado de Monitoreos</h1>
@stop

@section('content')
    <div class="p-2">
        <a class="btn btn-success" href="{{ route('monitoreo.pdf') }}">Descargar PDF</a>
    </div>
    <div class="table-responsive p-2">
        <table class="table">
            <th class="text-center align-middle">Fecha</th>
            <th class="text-center align-middle">Observaciones</th>
            <th class="text-center align-middle">Detalle</th>
            <th class="text-center align-middle">Responsable</th>
            <th class="text-center align-middle">Tipo de monitoreo</th>
            <th class="text-center align-middle">Acciones</th>
            @foreach ($monitoreos as $monitoreo)
                <tr>
                    <td class="text-center align-middle">{{ $monitoreo->fecha }}</td>
                    <td class="text-center align-middle">{{ $monitoreo->observaciones }}</td>
                    <td class="text-center align-middle">{{ $monitoreo->detalle }}</td>
                    <td class="text-center align-middle">{{ $monitoreo->responsable }}</td>
                    <td class="text-center align-middle">{{ $monitoreo->tipoMonitoreo }}</td>
                    <td class="d-flex justify-content-around align-items-center">
                        <a class="btn btn-primary" href="{{ route('monitoreo.fotos', $monitoreo->id) }}">Fotos</a>
                        <a class="btn btn-success mx-2" href="{{ route('monitoreo.edit', $monitoreo->id) }}">Editar</a>
                        <form action="{{ route('monitoreo.destroy', $monitoreo->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="p-2">
        {{ $monitoreos->links() }}
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
