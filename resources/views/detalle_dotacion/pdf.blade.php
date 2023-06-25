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
                <h1>Listado de Insumos Dotados</h1>
            </th>
        </tr>
    </table>
</div>

<table border="1" cellspacing="0">
    <tr>
        <th>Insumo</th>
        <th>Cantidad</th>
    </tr>

    @foreach ($detalleDotacion as $elemento)
        <tr>
            <td>{{ $elemento->insumo->nombre }}</td>
            <td>{{ $elemento->cantidad }}</td>
        </tr>
    @endforeach
</table>
