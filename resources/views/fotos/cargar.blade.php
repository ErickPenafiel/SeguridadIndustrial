@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="mb-3">Fotos Monitoreo</h1>
@stop

@section('content')
    <div>
        <h2>Cargar Fotos</h2>
        <form action="">
            <label for="seleccion" class="form-label">Seleccione sus archivos</label>
            <input class="form-control-file" type="file" name="fotos[]" id="fotos" multiple>
            <input type="submit" value="Enviar" class="btn btn-primary mt-4">
        </form>
    </div>

    <hr>

    <div>
        <h2>Fotos del monitoreo registrado</h2>
        <table class="table">
            <tr>
                <th>Nombre del Archivo</th>
                <th>Acciones</th>
            </tr>

            <tr>
                <td>foto-prueba01.jpeg</td>
                <td>
                    <a href="" class="btn btn-success">Ver</a>
                    <a href="" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>

            <tr>
                <td>foto-prueba02.jpeg</td>
                <td>
                    <a href="" class="btn btn-success">Ver</a>
                    <a href="" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>


            <tr>
                <td>foto-prueba03.jpeg</td>
                <td>
                    <a href="" class="btn btn-success">Ver</a>
                    <a href="" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>

            <tr>
                <td>foto-prueba04.jpeg</td>
                <td>
                    <a href="" class="btn btn-success">Ver</a>
                    <a href="" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        </table>
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
