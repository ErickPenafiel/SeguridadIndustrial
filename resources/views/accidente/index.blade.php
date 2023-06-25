@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Listado de Accidentes</h1>
@stop

@section('content')
    <div class="p-2">
        {!! $chart->container() !!}
    </div>

    <div class="p-2">
        <a href="{{ route('accidente.pdf') }}" class="btn btn-primary">Generar PDF</a>
    </div>

    <div class="table-responsive mt-2 p-2">
        <table class="table align-middle">
            <th class="text-center">Fecha del Accidente</th>
            <th class="text-center">Trabajador</th>
            <th class="text-center">Area</th>
            <th class="text-center">Severidad</th>
            <th class="text-center">Causa</th>
            <th class="text-center">Detalle</th>
            <th class="text-center">Responsable</th>
            <th class="text-center">Observaciones</th>
            <th class="text-center">Acciones</th>
            @foreach ($accidentes as $accidente)
                <tr>
                    <td class="text-center">{{ $accidente->fecha }}</td>
                    <td class="text-center">{{ $accidente->trabajador->nombre }}</td>
                    <td class="text-center">{{ $accidente->area->nombre }}</td>
                    <td class="text-center">{{ $accidente->severidad }}</td>
                    <td class="text-center">{{ $accidente->causa }}</td>
                    <td class="text-center">{{ $accidente->detalle }}</td>
                    <td class="text-center">{{ $accidente->responsable }}</td>
                    <td class="text-center">{{ $accidente->observaciones }}</td>
                    <td class="d-flex justify-content-around text-center">
                        <a class="btn btn-success" href="{{ route('accidente.edit', $accidente->id) }}">Editar</a>
                        <form action="{{ route('accidente.destroy', $accidente->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="px-2">
        {{ $accidentes->links() }}
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
