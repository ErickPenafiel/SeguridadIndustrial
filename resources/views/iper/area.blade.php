@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Iper</h1>
@stop

@section('content')
    <?php $areas = App\Models\Area::all(); ?>
    <div class="p-2 d-flex justify-content-around">
        @foreach ($areas as $area)
            <a href="{{ route('iper.area', $area->id) }}" class="btn btn-primary">{{ $area->nombre }}</a>
        @endforeach
    </div>

    <div class="table-responsive p-2">
        <table class="table">
            <th class="text-center align-middle">Sector</th>
            <th class="text-center align-middle">Actividad</th>
            <th class="text-center align-middle">Peligro</th>
            <th class="text-center align-middle">Riesgo</th>
            <th class="text-center align-middle">Daño - Lesion</th>
            <th class="text-center align-middle">Medidas de controles exigentes</th>
            <th class="text-center align-middle">Equipos e Instalaciones</th>
            <th class="text-center align-middle">Procedimientos</th>
            <th class="text-center align-middle">Capacitaciones</th>
            <th class="text-center align-middle">Personas Expuestas</th>
            <th class="text-center align-middle">Frecuencia</th>
            <th class="text-center align-middle">Valor de Probabilidad</th>
            <th class="text-center align-middle">Indice de Probabilidad</th>
            <th class="text-center align-middle">Severidad</th>
            <th class="text-center align-middle">Indice de riesgo</th>
            <th class="text-center align-middle">Valoracion</th>
            <th class="text-center align-middle">Medidas de control</th>
            <th class="text-center align-middle">Jerarquia de control</th>
            <th class="text-center align-middle">Responsables</th>
            @foreach ($ipers as $iper)
                <tr>
                    <td class="text-center align-middle">{{ $iper->sector }}</td>
                    <td class="text-center align-middle">{{ $iper->actividad }}</td>
                    <td class="text-center align-middle">{{ $iper->peligro }}</td>
                    <td class="text-center align-middle">{{ $iper->riesgo }}</td>
                    <td class="text-center align-middle">{{ $iper->daño }}</td>
                    <td class="text-center align-middle">{{ $iper->medidas }}</td>
                    <td class="text-center align-middle">{{ $iper->equipos }}</td>
                    <td class="text-center align-middle">{{ $iper->procedimientos }}</td>
                    <td class="text-center align-middle">{{ $iper->capacitaciones }}</td>
                    <td class="text-center align-middle">{{ $iper->personasExpuestas }}</td>
                    <td class="text-center align-middle">{{ $iper->frecuencia }}</td>
                    <td class="text-center align-middle">{{ $iper->valorProbabilidad }}</td>
                    <td class="text-center align-middle">{{ $iper->indiceProbabilidad }}</td>
                    <td class="text-center align-middle">{{ $iper->severidad }}</td>
                    <td class="text-center align-middle">{{ $iper->indiceRiesgo }}</td>
                    <td class="text-center align-middle">{{ $iper->valoracion }}</td>
                    <td class="text-center align-middle">{{ $iper->medidasControl }}</td>
                    <td class="text-center align-middle">{{ $iper->jerarquiaControl }}</td>
                    <td class="text-center align-middle">{{ $iper->responsables }}</td>
                    <td class="d-flex justify-content-around align-items-centers">
                        <a class="btn btn-success mr-2" href="{{ route('iper.edit', $iper->id) }}">Editar</a>
                        <form action="{{ route('iper.destroy', $iper->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="p-2">
        {{ $ipers->links() }}
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
