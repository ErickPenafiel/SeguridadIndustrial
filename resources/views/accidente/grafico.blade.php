@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Grafico de Accidentes</h1>
@stop

@section('content')
    <div class="px-3 pb-3">
        <h2 class="mt-3">Accidentes en el ultimo año</h2>
        <div class="container">
            {!! $chart->container() !!}
        </div>

        <h2 class="mt-3">Accidentes en el ultimo mes</h2>
        <div class="container">
            {!! $chartMeses->container() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
    {!! $chart->script() !!}
    {!! $chartMeses->script() !!}
@stop
