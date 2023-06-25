@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Listar Mantenimiento de Maquinaria</h1>
@stop

@section('content')
    <div class="p-2">
        <a href="{{ route('mantenimiento.pdf') }}" class="btn btn-primary mt-2">Generar PDF</a>
    </div>
    <div class="table-responsive p-2">
        <table class="table">
            <th class="text-center align-middle">Registro de Maquinaria</th>
            <th class="text-center align-middle">Fecha de Mantenimiento</th>
            <th class="text-center align-middle">Responsable</th>
            <th class="text-center align-middle">Acciones</th>
            @foreach ($mantenimiento_maquinarias as $mantenimiento)
                <tr>
                    <td class="text-center align-middle">{{ $mantenimiento->maquinaria->nombre }}</td>
                    <td class="text-center align-middle">{{ $mantenimiento->fecha }}</td>
                    <td class="text-center align-middle">{{ $mantenimiento->trabajador->nombre }}</td>
                    <td class="d-flex justify-content-around alig-items-center">
                        <a class="btn btn-success" href="{{ route('mantenimiento.edit', $mantenimiento->id) }}">Editar</a>
                        <form action="{{ route('mantenimiento.destroy', $mantenimiento->id) }}" method="POST">
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
        {{ $mantenimiento_maquinarias->links() }}
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
