@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Editar datos de Trabajador</h1>
@stop

@section('content')
    <div class="p-2">
        <form action="{{ route('trabajador.update', $trabajador->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mt-2">
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="nombre">Nombres</label>
                    <input class="form-control" type="text" name="nombre" id="nombre"
                        value="{{ $trabajador->nombre }}">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="apellidos">Apellidos</label>
                    <input class="form-control" type="text" name="apellido" id="apellido"
                        value="{{ $trabajador->apellido }}">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="ci">CI: </label>
                    <input class="form-control" type="number" name="ci" id="ci" value="{{ $trabajador->ci }}">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="fechaNacimiento">Fecha de Nacimiento: </label>
                    <input class="form-control" type="date" name="fechaNacimiento" id="fechaNacimiento"
                        value="{{ $trabajador->fechaNacimiento }}">
                </div>
            </div>
            <div class="mt-2">
                <label for="email" class="form-label">Area</label>
                <select name="id_area" id="id_area" value="{{ $trabajador->id_area }}" class="form-control">
                    {{ $areas = App\Models\Area::all() }}
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                    @endforeach
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
