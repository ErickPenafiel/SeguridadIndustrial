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
    <th>Registro de Maquinaria</th>
    <th>Fecha de Mantenimiento</th>
    <th>Responsable</th>
    @foreach ($mantenimiento_maquinarias as $mantenimiento)
        <tr>
            <td>{{ $mantenimiento->maquinaria->nombre }}</td>
            <td>{{ $mantenimiento->fecha }}</td>
            <td>{{ $mantenimiento->trabajador->nombre }}</td>
        </tr>
    @endforeach
</table>
