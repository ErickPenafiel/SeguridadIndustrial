@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Lista de Dotaciones</h1>
@stop

@section('content')

    <div class="p-2">
        <a href="{{ route('dotacionepp.pdf') }}" class="btn btn-primary mt-2">Generar PDF</a>
    </div>
    <div class="table-responsive p-2">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center align-middle">Nombre</th>
                    <th class="text-center align-middle">Area</th>
                    <th class="text-center align-middle">Cantidad</th>
                    <th class="text-center align-middle">Periodo de dotacion</th>
                    <th class="text-center align-middle">Fecha de dotacion</th>
                    <th class="text-center align-middle">Responsable</th>
                    <th class="text-center align-middle">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($dotacionepps as $dotacionepp)
                    <tr>
                        <td class="text-center align-middle">{{ $dotacionepp->nombreDotacion }}</td>
                        <td class="text-center align-middle">{{ $dotacionepp->area->nombre }}</td>
                        <td class="text-center align-middle">{{ $dotacionepp->cantidad }}</td>
                        <td class="text-center align-middle">{{ $dotacionepp->periodoDotacion }}</td>
                        <td class="text-center align-middle">{{ $dotacionepp->fechaDotacion }}</td>
                        <td class="text-center align-middle">{{ $dotacionepp->trabajador->nombre }}</td>
                        <td class="d-flex justify-content-around align-items-center align-middle">
                            <a class="btn btn-primary" href="{{ route('dotacionepp.lista', $dotacionepp->id) }}">Agregar
                                Insumos</a>
                            <a class="btn btn-primary ml-3"
                                href="{{ route('dotacionepp.detalle', $dotacionepp->id) }}">Detalle
                                Dotacion</a>
                            <a href="{{ route('dotacionepp.edit', $dotacionepp->id) }}"
                                class="btn btn-success ml-3">Editar</a>
                            <form action="{{ route('dotacionepp.destroy', $dotacionepp->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mx-3">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="p-2">
        {{ $dotacionepps->links() }}
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
