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
                <h1>Listado de Capacitaciones</h1>
            </th>
        </tr>
    </table>
</div>

<table border="1" cellspacing="0">
    <th>Area</th>
    <th>Expositor</th>
    <th>Contenido</th>
    <th>Fecha Inicio</th>
    <th>Fecha Fin</th>
    <th>Estado</th>
    @foreach ($capacitaciones as $capacitacion)
        <tr>
            <td>{{ $capacitacion->area->nombre }}</td>
            <td>{{ $capacitacion->nombre . ' ' . $capacitacion->apellido }}</td>
            <td>{{ $capacitacion->contenido }}</td>
            <td>{{ $capacitacion->fechaInicio }}</td>
            <td>{{ $capacitacion->fechaFin }}</td>
            <td>
                <p>{{ $capacitacion->estado }}</p>
            </td>
        </tr>
    @endforeach
</table>
