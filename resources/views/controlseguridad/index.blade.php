@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Controles de Seguridad registrados</h1>
@stop

@section('content')
    <div class="p-2">
        <a href="{{ route('controlseguridad.pdf') }}" class="btn btn-primary mt-2">Generar PDF</a>
    </div>

    <div class="table-responsive p-2">
        <table class="table">
            <thead>
                <th class="text-center">Responsable</th>
                <th class="text-center">Area</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Puntaje</th>
                <th class="text-center">Acciones</th>
            </thead>

            <tbody>
                @foreach ($controlseguridads as $controlseguridad)
                    <tr>
                        <td class="text-center">
                            {{ $controlseguridad->trabajador->nombre . ' ' . $controlseguridad->trabajador->apellido }}</td>
                        <td class="text-center">{{ $controlseguridad->area->nombre }}</td>
                        <td class="text-center">{{ $controlseguridad->fecha }}</td>
                        <td class="text-center">{{ $controlseguridad->puntaje }}</td>
                        <td class="d-flex justify-content-around">
                            <a href="{{ route('controlseguridad.edit', $controlseguridad->id) }}"
                                class="btn btn-success">Editar</a>
                            <form action="{{ route('controlseguridad.destroy', $controlseguridad->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            {{ $controlseguridads->links() }}
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
