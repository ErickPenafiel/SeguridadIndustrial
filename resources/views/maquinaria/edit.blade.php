@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Listado de Maquinaria</h1>
@stop

@section('content')
    <div class="p-2">
        <h2>Agregar Maquinaria</h2>
        <form action="{{ route('maquinaria.update', $maquinaria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-4">
                    <label class="form-label" for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" id="nombre"
                        value="{{ $maquinaria->nombre }}">
                    @error('nombre')
                        <div class="alert alert-danger mt-3"><small>*{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-4">
                    <label class="form-label" for="descripcion">Descripcion: </label>
                    <input class="form-control" type="text" name="descripcion" id="descripcion"
                        value="{{ $maquinaria->descripcion }}">
                    @error('descripcion')
                        <div class="alert alert-danger mt-3"><small>*{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-4">
                    <label class="form-label" for="area">Area: </label>
                    <select name="area_id" id="area_id" class="form-control">
                        {{ $areas = App\Models\Area::all() }}
                        @foreach ($areas as $area)
                            @if ($area->id == $maquinaria->area_id)
                                <option value="{{ $area->id }}" selected>{{ $area->nombre }}</option>
                            @endif
                            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                        @endforeach
                    </select>
                    @error('area')
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
