@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Registrar Accidente</h1>
@stop

@section('content')
    <div class="p-2">
        <form action="{{ route('accidente.store') }}" method="POST">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-12 col-lg-6">
                    <label class="form-label" for="fecha">Fecha del Accidente</label>
                    <input type="date" name="fecha" id="fecha" class="form-control">
                </div>
                <div class="col-sm-12 col-lg-6">
                    <label class="form-label" for="severidad">Severidad del Accidente</label>
                    <input type="number" name="severidad" id="severidad" class="form-control" min="1"
                        max="5">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="trabajador_id">Trabajador: </label>
                    <select name="trabajador_id" id="trabajador_id" class="form-control">
                        @foreach ($trabajadores as $trabajador)
                            <option value="{{ $trabajador->id }}">{{ $trabajador->nombre . ' ' . $trabajador->apellido }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="area_id">Area:</label>
                    <select name="area_id" id="area_id" class="form-control">
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="causa">Causa: </label>
                    <input type="text" name="causa" id="causa" class="form-control">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="detalle">Detalle:</label>
                    <input type="text" name="detalle" id="detalle" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="Responsable">Responsable:</label>
                    <input type="text" name="responsable" id="responsable" class="form-control">

                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="observaciones">Observaciones:</label>
                    <input type="text" name="observaciones" id="observaciones" class="form-control">
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
