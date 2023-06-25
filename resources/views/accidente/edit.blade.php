@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar registro de accidente</h1>
@stop

@section('content')
    <form action="{{ route('accidente.store'), $accidente->id }}" method="POST">
        @csrf
        <label class="form-label" for="fecha">Fecha del Accidente</label>
        <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $accidente->fecha }}">

        <div>
            <label class="form-label" for="causa">Causa: </label>
            <input type="text" name="causa" id="causa" class="form-control" value="{{ $accidente->causa }}">
            <label class="form-label" for="detalle">Detalle:</label>
            <input type="text" name="detalle" id="detalle" class="form-control" value="{{ $accidente->detalle }}">
        </div>

        <div>
            <label class="form-label" for="Responsable">Responsable:</label>
            <input type="text" name="responsable" id="responsable" class="form-control"
                value="{{ $accidente->responsable }}">
            <label class="form-label" for="observaciones">Observaciones:</label>
            <input type="text" name="observaciones" id="observaciones" class="form-control"
                value="{{ $accidente->observaciones }}">
        </div>

        <button type="submit">Guardar</button>
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
