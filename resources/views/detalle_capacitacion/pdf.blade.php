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
                <h1>Listado de Trabajadores Registrados</h1>
            </th>
        </tr>
    </table>
</div>

<table border="1" cellspacing="0">
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
    </tr>

    @foreach ($detalleCapacitacion as $elemento)
        <tr>
            <td>{{ $elemento->trabajador->nombre }}</td>
            <td>{{ $elemento->trabajador->apellido }}</td>
        </tr>
    @endforeach
</table>
