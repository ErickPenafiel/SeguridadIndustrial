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
                <h1>Listado de Insumos</h1>
            </th>
        </tr>
    </table>
</div>

<table border="1" cellspacing="0">
    <th>Nombre</th>
    <th>Cantidad</th>
    @foreach ($insumos as $insumo)
        <tr>
            <td>{{ $insumo->nombre }}</td>
            <td>{{ $insumo->cantidad }}</td>
        </tr>
    @endforeach
</table>
