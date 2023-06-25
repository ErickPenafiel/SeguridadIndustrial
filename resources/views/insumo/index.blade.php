@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Insumos</h1>
@stop

@section('content')
    <div class="p-2">
        <a href="{{ route('insumo.pdf') }}" class="btn btn-primary mt-2">Generar PDF</a>
    </div>
    <h2 class="p-2">Registro de insumos</h2>

    <div class="p-2">
        <form action="{{ route('insumo.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label class="form-label" for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" id="nombre">
                    @error('nombre')
                        <div class="alert alert-danger mt-3"><small>*{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-6">
                    <label class="form-label" for="cantidad">Cantidad: </label>
                    <input class="form-control" type="number" name="cantidad" id="cantidad">
                    @error('cantidad')
                        <div class="alert alert-danger mt-3"><small>*{{ $message }}</small></div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Registrar</button>
        </form>
    </div>

    <h2 class="mt-3 p-2">Lista de insumos</h2>
    <div class="table-responsive p-2">
        <table class="table">
            <th class="text-center align-middle">Nombre</th>
            <th class="text-center align-middle">Cantidad</th>
            <th class="text-center align-middle">Acciones</th>
            @foreach ($insumos as $insumo)
                <tr>
                    <td class="text-center align-middle">{{ $insumo->nombre }}</td>
                    <td class="text-center align-middle">{{ $insumo->cantidad }}</td>

                    <td class="d-flex justify-content-center align-items-center">
                        <a class="btn btn-success mr-2" href="{{ route('insumo.edit', $insumo->id) }}">Editar</a>
                        <form action="{{ route('insumo.destroy', $insumo->id) }}" method="POST">
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
        {{ $insumos->links() }}
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
