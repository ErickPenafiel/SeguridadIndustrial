@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Actualizar Dotacion</h1>
@stop

@section('content')
    <form action="{{ route('dotacionepp.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <label class="form-label" for="nombreDotacion">Nombre de Dotacion: </label>
                <input class="form-control" type="text" name="nombreDotacion" id="nombreDotacion"
                    value="{{ $dotacionepp->nombre }}">
            </div>
            <div class="col-lg-6 col-ms-12">
                <label class="form-label" for="area">Area: </label>
                <select class="form-control" name="id_area" id="id_area">
                    {{ $areas = App\Models\Area::all() }}
                    @foreach ($areas as $area)
                        @if ($area->id == $dotacionepp->id_area)
                            <option value="{{ $area->id }}" selected>{{ $area->nombre }}</option>
                        @else
                            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-6 col-sm-12">
                <label class="form-label" for="periodoDotacion">Periodo de Dotacion: </label>
                <input class="form-control" type="text" name="periodoDotacion" id="periodoDotacion">
            </div>
            <div class="col-lg-6 col-sm-12">
                <label class="form-label" for="fechaDotacion">Fecha de Dotacion: </label>
                <input class="form-control" type="date" name="fechaDotacion" id="fechaDotacion">
            </div>
        </div>

        <label class="form-label" for="cantidad">Cantidad: </label>
        <input class="form-control" type="number" name="cantidad" id="cantidad">
        <label class="form-label" for="responsable">Responsable</label>
        <select class="form-control" name="id_trabajador" id="id_trabajador">
            {{ $trabajadores = App\Models\Trabajador::all() }}
            @foreach ($trabajadores as $trabajador)
                <option value="{{ $trabajador->id }}">{{ $trabajador->nombre . $trabajador->apellido }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary mt-3">Registrar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
