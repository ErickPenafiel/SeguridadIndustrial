@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-2">Agregar Insumos</h1>
@stop

@section('content')
    <?php $insumos = App\Models\Insumo::all(); ?>

    <div class="p-2">
        @foreach ($insumos as $insumo)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $insumo->nombre }}</h5>
                    <p class="card-text">{{ $insumo->descripcion }}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach
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
