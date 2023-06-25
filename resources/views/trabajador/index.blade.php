@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Trabajadores</h1>
@stop

@section('content')
    <div class="p-2">
        <a class="btn btn-primary" href="{{ route('trabajador.pdf') }}">Generar PDF</a>
    </div>

    <h2 class="p-2">Lista de trabajadores</h2>

    <div class="table-responsive p-2">
        <table class="table">
            <th class="text-center align-middle">Ci</th>
            <th class="text-center align-middle">Nombres</th>
            <th class="text-center align-middle">Apellidos</th>
            <th class="text-center align-middle">Fecha de Nacimiento</th>
            <th class="text-center align-middle">Area</th>
            <th class="text-center align-middle">Acciones</th>
            @foreach ($trabajadores as $trabajador)
                <tr>
                    <td class="text-center align-middle">{{ $trabajador->ci }}</td>
                    <td class="text-center align-middle">{{ $trabajador->nombre }}</td>
                    <td class="text-center align-middle">{{ $trabajador->apellido }}</td>
                    <td class="text-center align-middle">{{ $trabajador->fechaNacimiento }}</td>
                    <td class="text-center align-middle">{{ $trabajador->area->nombre }}</td>
                    <td class="d-flex justify-content-around">
                        <a class="btn btn-primary" href="{{ route('trabajador.examenes', $trabajador->id) }}">Ver Examenes
                            Medicos</a>
                        <a class="btn btn-success" href="{{ route('trabajador.edit', $trabajador->id) }}">Editar</a>
                        <form action="{{ route('trabajador.destroy', $trabajador->id) }}" method="POST">
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
        {{ $trabajadores->links() }}
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
