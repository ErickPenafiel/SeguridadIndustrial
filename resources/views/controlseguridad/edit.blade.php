@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Actualizar Control de Seguridad</h1>
@stop

@section('content')
    <div class="p-2">
        <form action="{{ route('controlseguridad.update', $controlseguridad->id) }}" method="POST">
            @method('PUT')
            @csrf
            <label class="form-label" for="id_trabajador">Responsable</label>
            <select class="form-control" name="id_trabajador" id="id_trabajador">
                {{ $trabajadores = App\Models\Trabajador::all() }}
                @foreach ($trabajadores as $trabajador)
                    @if ($controlseguridad->id_trabajador == $trabajador->id)
                    @else
                    @endif
                    <option value="{{ $trabajador->id }}">{{ $trabajador->nombre . ' ' . $trabajador->apellido }}</option>
                @endforeach
            </select>

            <label class="form-label" for="id_area">Area</label>
            <select class="form-control" name="id_area" id="id_area">
                {{ $areas = App\Models\Area::all() }}
                @foreach ($areas as $area)
                    @if ($controlseguridad->id_area == $area->id)
                        <option value="{{ $area->id }}" selected>{{ $area->nombre }}</option>
                    @else
                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                    @endif
                @endforeach
            </select>

            <label for="form-label">Puntaje: </label>
            <input type="number" name="puntaje" id="puntaje" class="form-control"
                value="{{ $controlseguridad->puntaje }}">
            <input type="submit" class="btn btn-primary mt-3" value="Actualizar">
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
