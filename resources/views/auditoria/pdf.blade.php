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
                <h1>Listado de Auditorias</h1>
            </th>
        </tr>
    </table>
</div>

<table border="1" cellspacing="0">
    <th>Entidad</th>
    <th>Fecha de Auditoria</th>
    <th>Observaciones</th>
    <th>Recomendaciones</th>
    @foreach ($auditorias as $auditoria)
        <tr>
            <td>{{ $auditoria->auditoria }}</td>
            <td>{{ $auditoria->fecha }}</td>
            <td>{{ $auditoria->observaciones }}</td>
            <td>{{ $auditoria->responsable }}</td>
        </tr>
    @endforeach
</table>
