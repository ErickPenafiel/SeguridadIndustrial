@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Registrar Control de Seguridad</h1>
@stop

@section('content')
    <div class="p-2">

        <form action="{{ route('controlseguridad.store') }}" method="POST">
            @csrf
            <div class="row mt-2">
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="id_trabajador">Responsable</label>
                    <select class="form-control" name="id_trabajador" id="id_trabajador">
                        {{ $trabajadores = App\Models\Trabajador::all() }}
                        @foreach ($trabajadores as $trabajador)
                            <option value="{{ $trabajador->id }}">{{ $trabajador->nombre . ' ' . $trabajador->apellido }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label class="form-label" for="id_area">Area</label>
                    <select class="form-control" name="id_area" id="id_area">
                        {{ $areas = App\Models\Area::all() }}
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="p-3">
                <label for="" class="form-label">1. Control de EPP</label>
                <div class="d-flex justify-content-around align-items-center my-1">
                    <div>
                        <input type="radio" name="pregunta1" id="pregunta1" value="0">
                        <label for="">a. Incompleto</label>
                    </div>
                    <div>
                        <input type="radio" name="pregunta1" id="pregunta1" value="0.5">
                        <label for="">b. EPP Basico</label>
                    </div>
                    <div>
                        <input type="radio" name="pregunta1" id="pregunta1" value="1">
                        <label for="">b. EPP Completo</label>
                    </div>
                </div>

                <label for="" class="form-label">2. Control de rudio en decibelios</label>
                <div>
                    <div class="d-flex justify-content-around align-items-center my-1">
                        <div>
                            <input type="radio" name="pregunta2" id="pregunta2" value="0">
                            <label for="">a. 100 dB</label>
                        </div>
                        <div>
                            <input type="radio" name="pregunta2" id="pregunta2" value="0.5">
                            <label for="">b. 90 dB</label>
                        </div>
                        <div>
                            <input type="radio" name="pregunta2" id="pregunta2" value="1">
                            <label for="">c. 80 dB</label>
                        </div>
                    </div>
                </div>

                <label for="" class="form-label">3. Control de iluminacion en Lux</label>
                <div class="d-flex justify-content-around align-items-center my-1">
                    <div>
                        <input type="radio" name="pregunta3" id="pregunta3" value="0">
                        <label for="">a. Minimo 20 Lux</label>
                    </div>
                    <div>
                        <input type="radio" name="pregunta3" id="pregunta3" value="0.5">
                        <label for="">b. Recomendad 30 Lux</label>
                    </div>
                    <div>
                        <input type="radio" name="pregunta3" id="pregunta3" value="1">
                        <label for="">c. Optimo 50 Lux</label>
                    </div>
                </div>

                <label for="" class="form-label">4. Control de ventilacion en renovaciones/hora</label>
                <div class="d-flex justify-content-around align-items-center my-1">
                    <div>
                        <input type="radio" name="pregunta4" id="pregunta4" value="0">
                        <label for="">a. 0.5</label>
                    </div>
                    <div>
                        <input type="radio" name="pregunta4" id="pregunta4" value="0.5">
                        <label for="">b. 5</label>
                    </div>
                    <div>
                        <input type="radio" name="pregunta4" id="pregunta4" value="1">
                        <label for="">c. 5-10</label>
                    </div>
                </div>

                <label for="" class="form-label">5. Control de extintores</label>
                <div class="d-flex justify-content-around align-items-center my-1">
                    <div>
                        <input type="radio" name="pregunta5" id="pregunta5" value="0">
                        <label for="">a. Inexistencia de Extintores</label>
                    </div>
                    <div>
                        <input type="radio" name="pregunta5" id="pregunta5" value="0.5">
                        <label for="">b. Extintores en cada espacio</label>
                    </div>
                    <div>
                        <input type="radio" name="pregunta5" id="pregunta5" value="1">
                        <label for="">c. Extintores adecuados en cada espacio</label>
                    </div>
                </div>

                <label for="" class="form-label">6. Capacitaciones Respectivas</label>
                <div class="d-flex justify-content-around align-items-center my-1">
                    <div>
                        <input type="radio" name="pregunta6" id="pregunta6" value="0">
                        <label for="">a. Nulas en el area</label>
                    </div>
                    <div>
                        <input type="radio" name="pregunta6" id="pregunta6" value="0.5">
                        <label for="">b. Una vez al año</label>
                    </div>
                    <div>
                        <input type="radio" name="pregunta6" id="pregunta6" value="1">
                        <label for="">c. 4 veces al año</label>
                    </div>
                </div>

                <label for="" class="form-label">7. Señalizacion</label>
                <div class="d-flex justify-content-around align-items-center my-1">
                    <div>
                        <input type="radio" name="pregunta7" id="pregunta7" value="0">
                        <label for="">a. Escasa</label>
                    </div>
                    <div>
                        <input type="radio" name="pregunta7" id="pregunta7" value="0.5">
                        <label for="">b. Aceptable</label>
                    </div>
                    <div>
                        <input type="radio" name="pregunta7" id="pregunta7" value="1">
                        <label for="">c. Excelente</label>
                    </div>
                </div>

                <label for="" class="form-label">8. Control de coeficiente de peligrosidad</label>
                <div class="d-flex justify-content-around align-items-center my-1">
                    <div>
                        <input type="radio" name="pregunta8" id="pregunta8" value="0">
                        <label for="">a. Alta</label>
                    </div>
                    <div>
                        <input type="radio" name="pregunta8" id="pregunta8" value="0.5">
                        <label for="">b. Aceptable</label>
                    </div>
                    <div>
                        <input type="radio" name="pregunta8" id="pregunta8" value="1">
                        <label for="">c. Baja</label>
                    </div>
                </div>
            </div>

            <input type="submit" value="Registrar" class="btn btn-primary m-2">
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
