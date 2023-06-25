@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Registrar Mantenimiento de Maquinaria</h1>
@stop

@section('content')
    <div class="p-2">
        <form action="{{ route('mantenimiento.store') }}" method="POST">
            @csrf
            <div>
                <label class="form-label" for="nombre">Registro Maquinaria</label>
                <select name="maquinaria_id" id="maquinaria_id" class="form-control">
                    @foreach ($maquinarias as $maquinaria)
                        <option value="{{ $maquinaria->id }}">{{ $maquinaria->nombre }}</option>
                    @endforeach
                </select>
                <label class="form-label" for="fechaNacimiento">Fecha de Mantenimiento: </label>
                <input class="form-control" type="date" name="fecha" id="fecha">
            </div>
            <div>
                <label class="form-label" for="responsable">Responsable: </label>
                <select name="trabajador_id" id="trabajador_id" class="form-control">
                    @foreach ($trabajadores as $trabajador)
                        <option value="{{ $trabajador->id }}">{{ $trabajador->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Registrar</button>

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
