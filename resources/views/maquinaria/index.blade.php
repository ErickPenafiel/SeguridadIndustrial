@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Listado de Maquinaria</h1>
@stop

@section('content')
    <div class="p-2">
        <a class="btn btn-success" href="{{ route('maquinaria.pdf') }}">Descargar PDF</a>
    </div>
    <div class="p-2">
        <h2>Agregar Maquinaria</h2>
        <form action="{{ route('maquinaria.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <label class="form-label" for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" id="nombre">
                    @error('nombre')
                        <div class="alert alert-danger mt-3"><small>*{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-4">
                    <label class="form-label" for="descripcion">Descripcion: </label>
                    <input class="form-control" type="text" name="descripcion" id="descripcion">
                    @error('descripcion')
                        <div class="alert alert-danger mt-3"><small>*{{ $message }}</small></div>
                    @enderror
                </div>
                <div class="col-4">
                    <label class="form-label" for="area">Area: </label>
                    <select name="area_id" id="area_id" class="form-control">
                        {{ $areas = App\Models\Area::all() }}
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                        @endforeach
                    </select>
                    @error('area')
                        <div class="alert alert-danger mt-3"><small>*{{ $message }}</small></div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Registrar</button>
        </form>
    </div>

    <div class="table-responsive p-2">
        <table class="table align-middle">
            <th class="text-center align-middle">Nombre</th>
            <th class="text-center align-middle">Descripcion</th>
            <th class="text-center align-middle">Area</th>
            <th class="text-center align-middle">Acciones</th>
            @foreach ($maquinarias as $maquinaria)
                <tr>
                    <td class="text-center align-middle">{{ $maquinaria->nombre }}</td>
                    <td class="text-center align-middle">{{ $maquinaria->descripcion }}</td>
                    <td class="text-center align-middle">{{ $maquinaria->area->nombre }}</td>
                    <td class="d-flex justify-content-around align-items-centerssss">
                        <a class="btn btn-success mr-2" href="{{ route('maquinaria.edit', $maquinaria->id) }}">Editar</a>
                        <form action="{{ route('maquinaria.destroy', $maquinaria->id) }}" method="POST">
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
        {{ $maquinarias->links() }}
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
