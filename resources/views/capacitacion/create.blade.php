@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Registrar Capacitacion</h1>
@stop

@section('content')
    <div class="p-2">
        <form action="{{ route('capacitacion.store') }}" method="POST">
            @csrf
            <label for="area" class="form-label">Area</label>
            <select name="id_area" id="id_area" class="form-control">
                {{ $areas = App\Models\Area::all() }}
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                @endforeach
            </select>
            <div class="row mt-2">
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" id="nombre">
                    @error('nombre')
                        <div class="alert alert-danger mt-3"><small>*{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="contenido">Contenido: </label>
                    <input class="form-control" type="text" name="contenido" id="contenido">
                    @error('contenido')
                        <div class="alert alert-danger mt-3"><small>*{{ $message }}</small></div>
                    @enderror
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="fechaInicio">Fecha de Inicio: </label>
                    <input class="form-control" type="date" name="fechaInicio" id="fechaInicio">
                    @error('fechaInicio')
                        <div class="alert alert-danger mt-3"><small>*{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="fechaFin">Fecha de Finalizacion: </label>
                    <input class="form-control" type="date" name="fechaFin" id="fechaFin">
                    @error('fechaFin')
                        <div class="alert alert-danger mt-3"><small>*{{ $message }}</small></div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
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
