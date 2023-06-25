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
                <h1>Listado de Comites Mixtos</h1>
            </th>
        </tr>
    </table>
</div>

<table border="1" cellspacing="0">

    <th>Responsable</th>
    <th>Area</th>
    <th>Fecha</th>
    <th>Puntaje</th>

    @foreach ($controlseguridads as $controlseguridad)
        <tr>
            <td>
                {{ $controlseguridad->trabajador->nombre . ' ' . $controlseguridad->trabajador->apellido }}</td>
            <td>{{ $controlseguridad->area->nombre }}</td>
            <td>{{ $controlseguridad->fecha }}</td>
            <td>{{ $controlseguridad->puntaje }}</td>
        </tr>
    @endforeach
</table>
