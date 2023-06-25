@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Comites Registrados</h1>
@stop

@section('content')

    <div class="p-2">
        <a href="{{ route('comiteMixto.pdf') }}" class="btn btn-primary mt-2">Generar PDF</a>
    </div>
    <div class="table-responsive p-2">

        <table class="table">
            <th class="text-center">Primer Miembro</th>
            <th class="text-center">Segundo Miembro</th>
            <th class="text-center">Tercer Miembro</th>
            <th class="text-center">Cuarto Miembro</th>
            <th class="text-center">Fecha</th>
            <th class="text-center">Detalle</th>
            <th class="text-center">Observaciones</th>
            <th class="text-center">Acciones</th>
            @foreach ($comiteMixtos as $comiteMixto)
                <tr>
                    <td class="text-center">
                        {{ $comiteMixto->trabajador->nombre . ' ' . $comiteMixto->trabajador->apellido }}
                    </td>
                    <td class="text-center">
                        {{ $comiteMixto->trabajador2->nombre . ' ' . $comiteMixto->trabajador->apellido }}
                    </td>
                    <td class="text-center">
                        {{ $comiteMixto->trabajador3->nombre . ' ' . $comiteMixto->trabajador->apellido }}
                    </td>
                    <td class="text-center">
                        {{ $comiteMixto->trabajador4->nombre . ' ' . $comiteMixto->trabajador->apellido }}
                    </td>
                    <td class="text-center">{{ $comiteMixto->fecha }}</td>
                    <td class="text-center">{{ $comiteMixto->detalle }}</td>
                    <td class="text-center">{{ $comiteMixto->observaciones }}</td>
                    <td class="d-flex justify-content-around">
                        <a class="btn btn-info mx-2" href="{{ route('comiteMixto.show', $comiteMixto->id) }}">Reuniones</a>
                        <a class="btn btn-info" href="{{ route('comiteMixto.historial', $comiteMixto->id) }}">Historial</a>
                        <a class="btn btn-success mx-2" href="{{ route('comiteMixto.edit', $comiteMixto->id) }}">Editar</a>
                        <form action="{{ route('comiteMixto.destroy', $comiteMixto->id) }}" method="POST">
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
        {{ $comiteMixtos->links() }}
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
