@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Reuniones</h1>
@stop

@section('content')
    <div class="p-2">
        <h2>Programar Reunion</h2>

        <form action="{{ route('reunionComite.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label class="form-label" for="fecha">Fecha: </label>
                    <input class="form-control" type="date" name="fecha" id="fecha">
                    @error('fecha')
                        <div class="alert alert-danger mt-3"><small>*{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-6">
                    <label class="form-label" for="detalle">Detalle: </label>
                    <input class="form-control" type="text" name="detalle" id="detalle">
                    @error('detalle')
                        <div class="alert alert-danger mt-3"><small>*{{ $message }}</small></div>
                    @enderror
                </div>
                <input type="hidden" name="comite_id" value="{{ $comiteMixto->id }}">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Registrar</button>
        </form>

    </div>

    <h2 class="p-2">Reuniones</h2>
    <div class="table-responsive p-2">
        <table class="table">
            <th class="text-center">Fecha</th>
            <th class="text-center">Detalle</th>
            <th class="text-center">Estado</th>
            <th class="text-center">Acciones</th>
            @foreach ($reunionesComite as $reunion)
                <tr>
                    <td class="text-center">{{ $reunion->fecha }}</td>
                    <td class="text-center">{{ $reunion->detalle }}</td>
                    <td class="text-center">{{ $reunion->estado }}</td>

                    <td class="d-flex justify-content-around">
                        <a class="btn btn-success" href="{{ route('reunionComite.edit', $reunion->id) }}">Editar</a>
                        <form action="{{ route('reunionComite.destroy', $reunion->id) }}" method="POST">
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
        {{ $reunionesComite->links() }}
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
