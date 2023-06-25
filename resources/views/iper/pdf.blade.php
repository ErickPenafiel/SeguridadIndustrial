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

    * {
        font-size: 10px
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
    <th>Sector</th>
    <th>Actividad</th>
    <th>Peligro</th>
    <th>Riesgo</th>
    <th>Daño - Lesion</th>
    <th>Medidas de controles exigentes</th>
    <th>Equipos e Instalaciones</th>
    <th>Procedimientos</th>
    <th>Capacitaciones</th>
    <th>Personas Expuestas</th>
    <th>Frecuencia</th>
    <th>Valor de Probabilidad</th>
    <th>Indice de Probabilidad</th>
    <th>Severidad</th>
    <th>Indice de riesgo</th>
    <th>Valoracion</th>
    <th>Medidas de control</th>
    <th>Jerarquia de control</th>
    <th>Responsables</th>
    @foreach ($ipers as $iper)
        <tr>
            <td>{{ $iper->sector }}</td>
            <td>{{ $iper->actividad }}</td>
            <td>{{ $iper->peligro }}</td>
            <td>{{ $iper->riesgo }}</td>
            <td>{{ $iper->daño }}</td>
            <td>{{ $iper->medidas }}</td>
            <td>{{ $iper->equipos }}</td>
            <td>{{ $iper->procedimientos }}</td>
            <td>{{ $iper->capacitaciones }}</td>
            <td>{{ $iper->personasExpuestas }}</td>
            <td>{{ $iper->frecuencia }}</td>
            <td>{{ $iper->valorProbabilidad }}</td>
            <td>{{ $iper->indiceProbabilidad }}</td>
            <td>{{ $iper->severidad }}</td>
            <td>{{ $iper->indiceRiesgo }}</td>
            <td>{{ $iper->valoracion }}</td>
            <td>{{ $iper->medidasControl }}</td>
            <td>{{ $iper->jerarquiaControl }}</td>
            <td>{{ $iper->responsables }}</td>
        </tr>
    @endforeach
</table>
