@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Insumos en la dotacion</h1>
@stop

@section('content')
    <div class="p-2">
        <a class="btn btn-success" href="{{ route('detalleDotacion.pdf', $dotacionepp->id) }}">Descargar PDF</a>
    </div>
    <div class="table-responsive p-2">
        <table class="table">
            <tr>
                <th class="text-center align-middle">Insumo</th>
                <th class="text-center align-middle">Cantidad</th>
                <th class="text-center align-middle">Acciones</th>
            </tr>

            @foreach ($detalleDotacion as $elemento)
                <tr>
                    <td class="text-center align-middle">{{ $elemento->insumo->nombre }}</td>
                    <td class="text-center align-middle">{{ $elemento->cantidad }}</td>
                    <td class="d-flex justify-content-center align-items-cente">
                        <form action="{{ route('detalleDotacion.destroy', $elemento->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="p-2">
        {{ $detalleDotacion->links() }}
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
