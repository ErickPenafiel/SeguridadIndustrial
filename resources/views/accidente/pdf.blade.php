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
                <h1>Listado de Accidentes</h1>
            </th>
        </tr>
    </table>
</div>

<table border="1" cellspacing="0">
    <th>Fecha del Accidente</th>
    <th>Trabajador</th>
    <th>Area</th>
    <th>Severidad</th>
    <th>Causa</th>
    <th>Detalle</th>
    <th>Responsable</th>
    <th>Observaciones</th>
    @foreach ($accidentes as $accidente)
        <tr>
            <td>{{ $accidente->fecha }}</td>
            <td>{{ $accidente->trabajador->nombre }}</td>
            <td>{{ $accidente->area->nombre }}</td>
            <td>{{ $accidente->severidad }}</td>
            <td>{{ $accidente->causa }}</td>
            <td>{{ $accidente->detalle }}</td>
            <td>{{ $accidente->responsable }}</td>
            <td>{{ $accidente->observaciones }}</td>
        </tr>
    @endforeach
</table>
