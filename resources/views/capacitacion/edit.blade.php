@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Actualizar Datos de Capacitacion</h1>
@stop

@section('content')
    <div class="p-2">
        <form action="{{ route('capacitacion.update', $capacitacion->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="email" class="form-label">Area</label>
            <select name="id_area" id="id_area" value="{{ $capacitacion->id_area }}" class="form-control">
                {{ $areas = App\Models\Area::all() }}
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                @endforeach
            </select>
            <div class="row mt-2">
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" id="nombre"
                        value="{{ $capacitacion->nombre }}">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="contenido">Contenido: </label>
                    <input class="form-control" type="text" name="contenido" id="contenido"
                        value="{{ $capacitacion->contenido }}">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="fechaInicio">Fecha de inicio: </label>
                    <input class="form-control" type="date" name="fechaInicio" id="fechaInicio"
                        value="{{ $capacitacion->fechaInicio }}">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="fechaFin">Fecha de Finalizacion: </label>
                    <input class="form-control" type="date" name="fechaFin" id="fechaFin"
                        value="{{ $capacitacion->fechaFin }}">
                </div>

            </div>

            <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
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
