@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Grafico de Capacitaciones</h1>
@stop

@section('content')
    <div class="px-3 pb-3">
        <h2 class="mt-3">Capacitaciones en el ultimo mes</h2>
        <div class="container">
            {!! $chart->container() !!}
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
@stop
