@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Reuniones</h1>
@stop

@section('content')
    <h2 class="p-2">Programar Reunion</h2>

    <div class="p-2">
        <form action="{{ route('reunionComite.update', $reunionComite->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-6">
                    <label class="form-label" for="fecha">Fecha: </label>
                    <input class="form-control" type="date" name="fecha" id="fecha"
                        value="{{ $reunionComite->fecha }}">
                    @error('fecha')
                        <div class="alert alert-danger mt-3"><small>*{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-6">
                    <label class="form-label" for="detalle">Detalle: </label>
                    <input class="form-control" type="text" name="detalle" id="detalle"
                        value="{{ $reunionComite->detalle }}">
                    @error('detalle')
                        <div class="alert alert-danger mt-3"><small>*{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-6">
                    <label class="form-label" for="estado">Estado: </label>
                    <select class="form-control" name="estado" id="estado">
                        <option value="Pendiente">Pendiente</option>
                        <option value="Realizada">Realizada</option>
                    </select>
                    @error('estado')
                        <div class="alert alert-danger mt-3"><small>*{{ $message }}</small></div>
                    @enderror
                </div>


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
