@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Insumos</h1>
@stop

@section('content')
    <h2 class="p-2">Actualizar de insumo</h2>

    <div class="d-flex justify-content-center align-items-center p-2">
        <form action="{{ route('insumo.update', $insumo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" value="{{ $insumo->nombre }}">
                    @error('nombre')
                        <div class="alert alert-danger mt-3"><small>*{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="cantidad">Cantidad: </label>
                    <input class="form-control" type="number" name="cantidad" id="cantidad"
                        value="{{ $insumo->cantidad }}">
                    @error('cantidad')
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
