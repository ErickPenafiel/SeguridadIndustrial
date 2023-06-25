@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Agregar Insumos</h1>
@stop
@section('content')
    <?php $lista = session()->get('lista'); ?>

    <div class="p-2">
        @if (session()->has('lista') && count($lista) > 0 && $lista != null)
            <div class="alert alert-success">
                <strong>Se ha agregado un nuevo insumo - Cantidad de insumos {{ count($lista) }}</strong>
            </div>
        @endif
    </div>

    @if ($lista != null)
        <div class="table-responsive p-2">
            <table class="table">
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Eliminar</th>
                </tr>
                @foreach ($lista as $key => $item)
                    <tr>
                        <td>{{ $item['insumo']->nombre }}</td>
                        <td>{{ $item['cantidad'] }}</td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('lista.eliminarElemento', $key) }}">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="p-2 d-flex justify-content-between align-items-center">
            <a href="{{ route('detalleDotacion.registrarInsumos', $dotacionepp->id) }}" class="btn btn-success">Registrar
                Insumos Dotacion</a>
            <a href="{{ route('lista.eliminar') }}" class="btn btn-danger">Eliminar</a>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="p-2">
            <div class="alert alert-danger">
                <strong>{{ session()->get('error') }}</strong>
            </div>
        </div>
    @endif

    <div class="mt-2 container">
        @foreach ($insumos as $insumo)
            <form action="{{ route('lista.agregar', $insumo->id) }}">
                <div class="row">
                    <div class="col-12">
                        <div class="bg-primary text-white p-3 m-3 row rounded">
                            <div class="col-6">
                                <p class="m-0">{{ $insumo->nombre }}</p>
                            </div>
                            <div class="mx-3 text-center col-3">
                                <input type="number" name="cantidad" id="cantidad" class="form-control"
                                    placeholder="Cantidad">
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-success">Agregar</button>
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
