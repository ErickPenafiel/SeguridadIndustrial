@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Modificar Entrada al IPER</h1>
@stop

@section('content')
    <div class="p-2">
        <form action="{{ route('iper.update', $iper->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mt-2">
                <label for="area_id">Area: </label>
                <select name="area_id" id="area_id" class="form-control">
                    {{ $areas = App\Models\Area::all() }}
                    @foreach ($areas as $area)
                        @if ($area->id == $iper->area_id)
                            <option value="{{ $area->id }}" selected>{{ $area->nombre }}</option>
                        @else
                            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <label for="sector" class="form-label">Sector:</label>
                <textarea class="form-control" name="sector" id="sector" cols="4" rows="4">{{ $iper->sector }}</textarea>
            </div>
            <div class="mt-2">
                <label for="actividad" class="form-label">Actividad:</label>
                <textarea class="form-control" name="actividad" id="actividad" cols="4" rows="4">{{ $iper->actividad }}</textarea>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="peligro">Peligro:</label>
                    <input class="form-control" type="text" name="peligro" id="peligro" value="{{ $iper->peligro }}">
                    @error('peligro')
                        <div class="alert alert-danger mt-3"><small>*{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="riesgo">Riesgo: </label>
                    <input class="form-control" type="text" name="riesgo" id="riesgo" value="{{ $iper->riesgo }}">
                    @error('riesgo')
                        <div class="alert alert-danger mt-3"><small>*{{ $message }}</small></div>
                    @enderror
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="daño">Daño: </label>
                    <input class="form-control" type="text" name="daño" id="daño" value="{{ $iper->daño }}">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="medidas">Medidas: </label>
                    <input class="form-control" type="text" name="medidas" id="medidas" value="{{ $iper->medidas }}">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-4 col-sm-6">
                    <label class="form-label" for="equipos">Equipos e Instalaciones: </label>
                    <input class="form-control" type="number" name="equipos" id="equipos" min="1" max="10"
                        value="{{ $iper->equipos }}">
                </div>
                <div class="col-lg-4 col-sm-6">
                    <label class="form-label" for="procedimientos">Procedimientos: </label>
                    <input class="form-control" type="number" name="procedimientos" id="procedimientos" min="1"
                        max="10" value="{{ $iper->procedimientos }}">
                </div>
                <div class="col-lg-4 col-sm-6">
                    <label class="form-label" for="capacitaciones">Capacitaciones: </label>
                    <input class="form-control" type="number" name="capacitaciones" id="capacitaciones" min="1"
                        max="10" value="{{ $iper->capacitaciones }}">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="personasExpuestas">Personas Expuestas: </label>
                    <input class="form-control" type="number" name="personasExpuestas" id="personasExpuestas"
                        min="1" max="10" value="{{ $iper->personasExpuestas }}">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="frecuencia">Frecuencia: </label>
                    <input class="form-control" type="number" name="frecuencia" id="frecuencia" min="1"
                        max="10" value="{{ $iper->frecuencia }}">
                </div>
            </div>

            <div class="mt-2">
                <label class="form-label" for="severidad">Severidad: </label>
                <input class="form-control" type="number" name="severidad" id="severidad" min="1"
                    max="5" value="{{ $iper->severidad }}">
            </div>
            <div class="mt-2">
                <label for="medidasControl" class="form-label">Medidas Control</label>
                <textarea class="form-control" name="medidasControl" id="medidasControl" cols="30" rows="4">{{ $iper->medidasControl }}</textarea>
            </div>
            <div class="mt-2">
                <label for="jerarquiaControl" class="form-label">Jerarquia de control:</label>
                <textarea class="form-control" name="jerarquiaControl" id="jerarquiaControl" cols="30" rows="4">{{ $iper->jerarquiaControl }}</textarea>
            </div>
            <div class="mt-2">
                <label for="responsables" class="form-label">Responsables:</label>
                <textarea class="form-control" name="responsables" id="responsables" cols="30" rows="4">{{ $iper->responsables }}</textarea>
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
