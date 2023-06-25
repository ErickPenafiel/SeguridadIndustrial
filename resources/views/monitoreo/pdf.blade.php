<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        text-align: center;
        padding: 8px;
    }
</style>

<div>
    <table>
        <tr>
            <th>
                <img src="{{ public_path('\storage\logo\logo-salvietti.png') }}" alt="" width="100px">
            </th>
            <th>
                <h1>Listado de Monitoreos</h1>
            </th>
        </tr>
    </table>
</div>

<table border="1" cellspacing="0">
    <th>Fecha</th>
    <th>Observaciones</th>
    <th>Detalle</th>
    <th>Responsable</th>
    <th>Tipo de monitoreo</th>
    @foreach ($monitoreos as $monitoreo)
        <tr>
            <td>{{ $monitoreo->fecha }}</td>
            <td>{{ $monitoreo->observaciones }}</td>
            <td>{{ $monitoreo->detalle }}</td>
            <td>{{ $monitoreo->responsable }}</td>
            <td>{{ $monitoreo->tipoMonitoreo }}</td>
        </tr>
    @endforeach
</table>
