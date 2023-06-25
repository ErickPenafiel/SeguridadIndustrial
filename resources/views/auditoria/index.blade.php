@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Listado de Auditorias</h1>
@stop

@section('content')
    <div class="p-2">
        <a href="{{ route('auditoria.pdf') }}" class="btn btn-primary mt-2">Generar PDF</a>
    </div>

    <div class="table-responsive p-2">
        <table class="table">
            <th class="text-center align-middle">Entidad</th>
            <th class="text-center align-middle">Fecha de Auditoria</th>
            <th class="text-center align-middle">Observaciones</th>
            <th class="text-center align-middle">Recomendaciones</th>
            <th class="text-center align-middle">Acciones</th>
            @foreach ($auditorias as $auditoria)
                <tr>
                    <td class="text-center align-middle">{{ $auditoria->auditoria }}</td>
                    <td class="text-center align-middle">{{ $auditoria->fecha }}</td>
                    <td>{{ $auditoria->observaciones }}</td>
                    <td class="text-center align-middle">{{ $auditoria->responsable }}</td>
                    <td class="d-flex justify-content-around">
                        <a class="btn btn-primary" href="{{ route('auditoria.fotos', $auditoria->id) }}">Fotos</a>
                        <a class="btn btn-success mx-2"
                            href="{{ route('auditoria.edit', ['auditorium' => $auditoria->id]) }}">Editar</a>
                        <form action="{{ route('auditoria.destroy', $auditoria->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div>
        {{ $auditorias->links() }}
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
