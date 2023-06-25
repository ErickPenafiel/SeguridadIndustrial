@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Crear Comite Mixto</h1>
@stop

@section('content')
    <div class="p-2">
        <form action="{{ route('comiteMixto.store') }}" method="POST">

            @csrf
            <div class="row mt-2">
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="miembro1">Primer Miembro</label>
                    <select class="form-control" name="miembro1" id="miembro1">
                        {{ $trabajadores = App\Models\Trabajador::all() }}
                        @foreach ($trabajadores as $trabajador)
                            <option value="{{ $trabajador->id }}">{{ $trabajador->nombre . $trabajador->Apellido }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="miembro2">Segundo Miembro</label>
                    <select class="form-control" name="miembro2" id="miembro2">
                        @foreach ($trabajadores as $trabajador)
                            <option value="{{ $trabajador->id }}">{{ $trabajador->nombre . $trabajador->Apellido }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="miembro3">Tercero Miembro</label>
                    <select class="form-control" name="miembro3" id="miembro3">
                        @foreach ($trabajadores as $trabajador)
                            <option value="{{ $trabajador->id }}">{{ $trabajador->nombre . $trabajador->Apellido }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="miembro4">Cuarto Miembro</label>
                    <select class="form-control" name="miembro4" id="miembro4">
                        @foreach ($trabajadores as $trabajador)
                            <option value="{{ $trabajador->id }}">{{ $trabajador->nombre . $trabajador->Apellido }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-12 col-lg-6">
                    <label class="form-label" for="fecha">Fecha: </label>
                    <input class="form-control" type="date" name="fecha" id="fecha">
                </div>
                <div class="col-sm-12 col-lg-6">
                    <label class="form-label" for="detalle">Detalle: </label>
                    <input class="form-control" type="text" name="detalle" id="detalle">
                </div>
            </div>
            <label class="form-label" for="observaciones">Observaciones: </label>
            <input class="form-control" type="text" name="observaciones" id="observaciones">

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
