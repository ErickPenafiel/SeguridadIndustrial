@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>IPERC</h1>
@stop

@section('content')
    <table class="table">
        <tr>
            <th>Nombre</th>
            <th>Unidad - nivel</th>
            <th>Matriz de evaluacion de riesgo (PXC)</th>
            <th># evaluaciones con riesgo significativo</th>
            <th># de controles para implementar</th>
            <th># de controles con retraso</th>
        </tr>

        <tr>
            <td>Prueba S.A.C</td>
            <td>Hasta Actividad</td>
            <td>3x3</td>
            <td>0/0</td>
            <td>0</td>
            <td>0</td>
        </tr>

        <tr>
            <td>facere ut autem debitis nam inventore</td>
            <td>Hasta Actividad</td>
            <td>3x3</td>
            <td>0/0</td>
            <td>0</td>
            <td>0</td>
        </tr>

        <tr>
            <td>fuga ea. Ea, labore sunt.</td>
            <td>Hasta Actividad</td>
            <td>3x3</td>
            <td>0/0</td>
            <td>0</td>
            <td>0</td>
        </tr>

        <tr>
            <td>Ipsum Lorem notnch</td>
            <td>Hasta Actividad</td>
            <td>3x3</td>
            <td>0/0</td>
            <td>0</td>
            <td>0</td>
        </tr>

        <tr>
            <td>Lorem ipsum notnch</td>
            <td>Hasta Actividad</td>
            <td>3x3</td>
            <td>0/0</td>
            <td>0</td>
            <td>0</td>
        </tr>

        <tr>
            <td>Lorem ipsum</td>
            <td>Hasta Actividad</td>
            <td>3x3</td>
            <td>0/0</td>
            <td>0</td>
            <td>0</td>
        </tr>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
