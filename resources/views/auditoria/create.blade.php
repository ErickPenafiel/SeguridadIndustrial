@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="px-2">Crear Auditoria</h1>
@stop

@section('content')
    <div class="p-2">
        <form action="{{ route('auditoria.store') }}" method="POST">
            @csrf
            <div>
                <div class="mt-2">
                    <label for="entidad" class="form-label">Entidad que realizo auditoria:</label>
                    <input class="form-control" type="date" name="entidad" id="entidad">
                </div>
                <div class="mt-2">
                    <label class="form-label" for="fecha">Fecha: </label>
                    <input class="form-control" type="date" name="fecha" id="fecha">
                </div>
                <div class="mt-2">
                    <label class="form-label" for="observaciones">Observaciones: </label>
                    <input class="form-control" type="text" name="observaciones" id="observaciones">
                </div>
                <div class="mt-2">
                    <label class="form-label" for="responsable">Responsable: </label>
                    <input class="form-control" type="text" name="responsable" id="responsable">
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
