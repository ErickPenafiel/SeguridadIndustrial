@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Modificar monitoreo</h1>
@stop

@section('content')
    <div class="p-2">
        <form action="{{ route('monitoreo.update', $monitoreo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mt-2">
                <label for="fecha" class="form-label">Fecha:</label>
                <input class="form-control" type="date" name="fecha" id="fecha" value="{{ $monitoreo->fecha }}">
            </div>
            <div class="mt-2">
                <label class="form-label" for="observaciones">Observaciones</label>
                <input class="form-control" type="text" name="observaciones" id="observaciones"
                    value="{{ $monitoreo->observaciones }}">
            </div>
            <div class="mt-2">
                <label class="form-label" for="detalle">Detalle: </label>
                <input class="form-control" type="text" name="detalle" id="detalle" value="{{ $monitoreo->detalle }}">
            </div>
            <div class="mt-2">
                <label class="form-label" for="responsable">Responsable: </label>
                <input class="form-control" type="text" name="responsable" id="responsable"
                    value="{{ $monitoreo->responsable }}">
            </div>
            <div class="mt-2">
                <label class="form-label" for="tipoMonitoreo">Tipo de Monitoreo: </label>
                <select name="tipoMonitoreo" id="tipoMonitoreo" class="form-control">

                    <option value="{{ $monitoreo->tipoMonitoreo }}" selected>{{ $monitoreo->tipoMonitoreo }}</option>
                    <option value="Ruido">Ruido</option>
                    <option value="Estres Termico">Estres Termico</option>
                    <option value="Iluminacion">Iluminacion</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
        </form>
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
