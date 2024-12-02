@php
    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
    $bitacoras = DB::select('select * from bitacoras where "Table" !=  ' . "'NULL'" .' and id >= ' . $reporte->First . ' and id <= ' . $reporte->Last);
@endphp
    <!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        h4 {
            margin: 0;
        }
        .margin-top {
            margin-top: 1.25rem;
        }
        table {
            width: 100%;
            border-spacing: 0;
        }
        td, tr, th, div {
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
        }
        table, th, td {
            border: 0.05px solid black;
        }
        .simple {
            border: 0px solid black;
        }
    </style>
</head>
<body>
<table class="simple">
    <tr class="simple">
        <td style="text-align: center;" class="simple">
            <b>TU CAFÉ COTOCA</b><br>
            CASA MATRIZ<br>
            Nro. Punto de Venta 102<br>
            AVENIDA SANTA CRUZ ZONA CENTRO DE LA CIUDAD<br>
            UV 1 MZA 6
        </td>
    </tr>
</table>

<div style="text-align: center">
    <br><br>
    <b style="font-size: 30px">REPORTE DE BITÁCORAS</b><br>
    <a>(Bitácoras entre {{ $reporte->FirstDat }} y {{ $reporte->LastDat }})</a>
</div>

<br>

<div>
    <table class="products simple">
        <tr>
            <th><b>USERNAME</b></th>
            <th><b>IP</b></th>
            <th><b>ACCION</b></th>
            <th><b>TABLA</b></th>
            <th><b>FILA</b></th>
            <th><b>FECHA Y HORA</b></th>
        </tr>
        @foreach($bitacoras as $bitacora)
        <tr class="items">
            <td style="text-align: center">
                {{ $bitacora->Username }}
            </td>
            <td style="text-align: center">
                {{ $bitacora->IP }}
            </td>
            <td style="text-align: center">
                {{ $bitacora->Action }}
            </td>
            <td style="text-align: center">
                {{ $bitacora->Table }}
            </td>
            <td style="text-align: center">
                {{ $bitacora->Row }}
            </td>
            <td style="text-align: center">
                {{ $bitacora->created_at }}
            </td>
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>
