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
                <h1>Reporte de Trabajadores</h1>
            </th>
        </tr>
    </table>
</div>

<table border="1" cellspacing="0">
    <th>Ci</th>
    <th>Nombres</th>
    <th>Apellidos</th>
    <th>Fecha de Nacimiento</th>
    <th>Area</th>
    @foreach ($trabajadores as $trabajador)
        <tr>
            <td>{{ $trabajador->ci }}</td>
            <td>{{ $trabajador->nombre }}</td>
            <td>{{ $trabajador->apellido }}</td>
            <td>{{ $trabajador->fechaNacimiento }}</td>
            <td>{{ $trabajador->area->nombre }}</td>
        </tr>
    @endforeach
</table>
