@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Capacitaciones</h1>
@stop

@section('content')
    <div class="p-2">
        {!! $chart->container() !!}
    </div>
    <hr>

    <div class="p-2">
        <a href="{{ route('capacitacion.pdf') }}" class="btn btn-primary mt-2">Generar PDF</a>
    </div>

    <h3 class="p-2">Lista de capacitaciones</h3>

    <div class="table-responsive p-2">
        <table class="table">
            <th class="text-center">Area</th>
            <th class="text-center">Expositor</th>
            <th class="text-center">Contenido</th>
            <th class="text-center">Fecha Inicio</th>
            <th class="text-center">Fecha Fin</th>
            <th class="text-center">Estado</th>
            <th class="text-center">Acciones</th>
            @foreach ($capacitaciones as $capacitacion)
                <tr>
                    <td class="text-center">{{ $capacitacion->area->nombre }}</td>
                    <td class="text-center">{{ $capacitacion->nombre . ' ' . $capacitacion->apellido }}</td>
                    <td class="text-center">{{ $capacitacion->contenido }}</td>
                    <td class="text-center">{{ $capacitacion->fechaInicio }}</td>
                    <td class="text-center">{{ $capacitacion->fechaFin }}</td>
                    @if ($capacitacion->estado == 'Aun no realizado')
                        <td class="text-center">
                            <p class="bg-danger p-1 text-center rounded">{{ $capacitacion->estado }}</p>
                        </td>
                    @elseif($capacitacion->estado == 'En proceso')
                        <td class="text-center">
                            <p class="bg-warning p-1 text-center rounded">{{ $capacitacion->estado }}</p>
                        </td>
                    @else
                        <td class="text-center">
                            <p class="bg-success p-1 text-center rounded">{{ $capacitacion->estado }}</p>
                        </td>
                    @endif

                    <td class="d-flex justify-content-around">
                        <a class="btn btn-primary" href="{{ route('capacitacion.lista', $capacitacion->id) }}">Agregar
                            Trabajadores</a>
                        <a class="btn btn-primary mx-2" href="{{ route('capacitacion.detalle', $capacitacion->id) }}">Lista
                            de trabajadores</a>
                        <a class="btn btn-success" href="{{ route('capacitacion.edit', $capacitacion->id) }}">Editar
                            Capacitacion</a>
                        <form action="{{ route('capacitacion.destroy', $capacitacion->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger mx-2" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div>
        {{ $capacitaciones->links() }}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
    {!! $chart->script() !!}
@stop
