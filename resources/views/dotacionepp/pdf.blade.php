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
                <h1>Listado de Dotaciones</h1>
            </th>
        </tr>
    </table>
</div>

<table border="1" cellspacing="0">

    <tr>
        <th>Nombre</th>
        <th>Area</th>
        <th>Cantidad</th>
        <th>Periodo de dotacion</th>
        <th>Fecha de dotacion</th>
        <th>Responsable</th>
    </tr>

    @foreach ($dotacionepps as $dotacionepp)
        <tr>
            <td>{{ $dotacionepp->nombreDotacion }}</td>
            <td>{{ $dotacionepp->area->nombre }}</td>
            <td>{{ $dotacionepp->cantidad }}</td>
            <td>{{ $dotacionepp->periodoDotacion }}</td>
            <td>{{ $dotacionepp->fechaDotacion }}</td>
            <td>{{ $dotacionepp->trabajador->nombre }}</td>
        </tr>
    @endforeach
</table>
