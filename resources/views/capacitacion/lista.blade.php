@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Agregar Insumos</h1>
@stop
@section('content')
    <?php $lista = session()->get('listaCapacitacion'); ?>

    @if (session()->has('listaCapacitacion') && count($lista) > 0 && $lista != null)
        <div class="alert alert-success">
            <strong>Se ha agregado un nuevo insumo - Cantidad de insumos {{ count($lista) }}</strong>
        </div>
    @endif

    @if ($lista != null)
        <table class="table">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Eliminar</th>
            </tr>
            @foreach ($lista as $key => $item)
                <tr>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->apellido }}</td>
                    <td>
                        <a class="btn btn-danger"
                            href="{{ route('listacapacitacion.eliminarTrabajador', $key) }}">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="p-2 d-flex justify-content-between align-items-center">
            <a href="{{ route('detalleCapacitacion.registrarTrabajadores', $capacitacion->id) }}"
                class="btn btn-success mt-2">Registrar Insumos
                Dotacion</a>
            <a href="{{ route('listacapacitacion.eliminar') }}" class="btn btn-danger mt-2">Eliminar Lista</a>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            <strong>{{ session()->get('error') }}</strong>
        </div>
    @endif




    <div class="mt-2 container">
        @foreach ($trabajadores as $trabajador)
            <form action="{{ route('listacapacitacion.agregar', $trabajador->id) }}">
                <div class="row">
                    <div class="col-12">
                        <div class="bg-primary text-white p-3 m-3 row rounded">
                            <div class="col-7">
                                <p class="ml-5">{{ $trabajador->nombre . ' ' . $trabajador->apellido }}</p>
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn btn-success mx-3">Agregar trabajador</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
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
