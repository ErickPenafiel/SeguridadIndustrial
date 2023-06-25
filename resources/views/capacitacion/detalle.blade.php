@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Trabajadores Registrados</h1>
@stop

@section('content')
    <div class="p-2">
        <a class="btn btn-success" href="{{ route('detalleCapacitacion.pdf', $capacitacion->id) }}">Descargar PDF</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Acciones</th>
            </tr>

            @foreach ($detalleCapacitacion as $elemento)
                <tr>
                    <td class="text-center">{{ $elemento->trabajador->nombre }}</td>
                    <td class="text-center">{{ $elemento->trabajador->apellido }}</td>
                    <td class="d-flex justify-content-center">
                        <form action="{{ route('detalleCapacitacion.destroy', $elemento->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="p-2">
            {{ $detalleCapacitacion->links() }}
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
