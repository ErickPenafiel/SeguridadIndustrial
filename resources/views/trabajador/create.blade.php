@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Registrar Trabajador</h1>
@stop

@section('content')
    <div class="p-2">
        <form action="{{ route('trabajador.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="nombre">Nombres</label>
                    <input class="form-control" type="text" name="nombre" id="nombre">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="apellidos">Apellidos</label>
                    <input class="form-control" type="text" name="apellido" id="apellido">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="ci">CI: </label>
                    <input class="form-control" type="number" name="ci" id="ci">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="fechaNacimiento">Fecha de Nacimiento: </label>
                    <input class="form-control" type="date" name="fechaNacimiento" id="fechaNacimiento">
                </div>
            </div>
            <div class="mt-2">
                <label for="email" class="form-label">Area</label>
                <select name="id_area" id="id_area" class="form-control">
                    {{ $areas = App\Models\Area::all() }}
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Registrar</button>
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
