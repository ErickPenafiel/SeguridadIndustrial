@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de Maquinaria</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Notificaciones sin leer
                    </div>

                    <div class="card-body">
                        @if (auth()->user())
                            @forelse ($stockNotifications as $notificacion)
                                <div class="alert alert-default-warning">
                                    Insumo title: {{ $notificacion->data['nombre'] }}
                                    <p>{{ $notificacion->created_at->diffForHumans() }}</p>
                                    <button type="submit" class="mark-as-read btn btn-sm btn-dark"
                                        data-id="{{ $notificacion->id }}">Mark
                                        as
                                        read</button>
                                </div>
                                @if ($loop->last)
                                    <a href="#" id="mark-all" class="btn btn-sm btn-dark">Marcar
                                        todas como leidas</a>
                                @endif
                            @empty
                                <div class="alert alert-default-warning">
                                    No hay notificaciones
                                </div>
                            @endforelse
                        @endif
                    </div>
                </div>
            </div>
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

    <script>
        const sendMarkRequest = (id = null) => {
            return $.ajax("{{ route('notificaciones.markAsRead') }}", {
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    id
                }
            });
        }

        $(function() {
            $('.mark-as-read').click(function() {
                let request = sendMarkRequest($(this).data('id'));

                request.done(() => {
                    $(this).parents('div.alert').remove();
                });
            });

            $('#mark-all').click(function() {
                let request = sendMarkRequest();

                request.done(() => {
                    $('div.alert').remove();
                })
            });
        });
    </script>
@stop
