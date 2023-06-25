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
    <th>Primer Miembro</th>
    <th>Segundo Miembro</th>
    <th>Tercer Miembro</th>
    <th>Cuarto Miembro</th>
    <th>Fecha</th>
    <th>Detalle</th>
    <th>Observaciones</th>
    @foreach ($comiteMixtos as $comiteMixto)
        <tr>
            <td>
                {{ $comiteMixto->trabajador->nombre . ' ' . $comiteMixto->trabajador->apellido }}
            </td>
            <td>
                {{ $comiteMixto->trabajador2->nombre . ' ' . $comiteMixto->trabajador->apellido }}
            </td>
            <td>
                {{ $comiteMixto->trabajador3->nombre . ' ' . $comiteMixto->trabajador->apellido }}
            </td>
            <td>
                {{ $comiteMixto->trabajador4->nombre . ' ' . $comiteMixto->trabajador->apellido }}
            </td>
            <td>{{ $comiteMixto->fecha }}</td>
            <td>{{ $comiteMixto->detalle }}</td>
            <td>{{ $comiteMixto->observaciones }}</td>
        </tr>
    @endforeach
</table>
