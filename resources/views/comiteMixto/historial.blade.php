@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Lista de Comites</h1>
@stop

@section('content')
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
            @foreach ($historialComites as $historialComite)
                <tr>
                    <td class="text-center">{{ $historialComite->trabajador->nombre }}</td>
                    <td class="text-center">{{ $historialComite->trabajador2->nombre }}</td>
                    <td class="text-center">{{ $historialComite->trabajador3->nombre }}</td>
                    <td class="text-center">{{ $historialComite->trabajador4->nombre }}</td>
                    <td class="text-center">{{ $historialComite->fecha }}</td>
                    <td class="text-center">{{ $historialComite->detalle }}</td>
                    <td class="text-center">{{ $historialComite->observaciones }}</td>
                    <td class="d-flex justify-content-center">
                        <form action="{{ route('historialComite.destroy', $historialComite->id) }}" method="POST">
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
        {{ $historialComites->links() }}
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
