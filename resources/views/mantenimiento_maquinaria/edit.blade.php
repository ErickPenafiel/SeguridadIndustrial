@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Editar registro de mantenimiento</h1>
@stop

@section('content')
    <div class="p-2">
        <form action="{{ route('mantenimiento.update', ['mantenimiento' => $mantenimiento_maquinaria->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label class="form-label" for="nombre">Registro Maquinaria</label>
                <select name="maquinaria_id" id="maquinaria_id" class="form-control">
                    @foreach ($maquinarias as $maquinaria)
                        @if ($maquinaria->id == $mantenimiento_maquinaria->maquinaria_id)
                            <option value="{{ $maquinaria->id }}" selected>{{ $maquinaria->nombre }}</option>
                        @else
                            <option value="{{ $maquinaria->id }}">{{ $maquinaria->nombre }}</option>
                        @endif
                    @endforeach
                </select>
                <label class="form-label" for="fechaNacimiento">Fecha de Mantenimiento: </label>
                <input class="form-control" type="date" name="fecha" id="fecha"
                    value="{{ $mantenimiento_maquinaria->fecha }}">
            </div>
            <div>
                <label class="form-label" for="responsable">Responsable: </label>
                <select name="trabajador_id" id="trabajador_id" class="form-control">
                    @foreach ($trabajadores as $trabajador)
                        @if ($trabajador->id == $mantenimiento_maquinaria->trabajador_id)
                            <option value="{{ $trabajador->id }}" selected>{{ $trabajador->nombre }}</option>
                        @else
                            <option value="{{ $trabajador->id }}">{{ $trabajador->nombre }}</option>
                        @endif
                    @endforeach
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
