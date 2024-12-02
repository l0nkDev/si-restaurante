@php
    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
    $data = DB::select('select items.coditem as coditem, sum(ordenas.Cantidad) as Cantidad, items.Nombre as Nombre, productos.precio as PU, sum(ordenas.Cantidad)*Precio as PT
                        from ordens, ordenas, items, productos
                        where ordens.idventa = ' . $factura->IDVenta . ' and ordens.numorden = ordenas.numorden and ordenas.codprod = productos.codprod and ordenas.codprod = items.coditem
                        group by items.coditem, items.nombre, productos.precio;');
    $subtotal = 0.25;
    $descuento = 0;
    $giftcard = 0;
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
        <td style="text-align: right;" class="simple">
            <b>NIT</b><br>
            <b>FACTURA NRO.</b><br>
            <b>COD. AUTORIZACIÓN</b><br>
        </td>
        <td style="text-align: right;" class="simple">
            <br>
            4083024010<br>
            {{ $factura->IDFactura }}<br>
            1175F30E1861D4BF16C70E95BA64E8<br>E661901D1682241922F06EC6D74
        </td>
    </tr>
</table>

<div style="text-align: center">
    <br><br>
    <b style="font-size: 30px">FACTURA</b><br>
    <a>(Con Derecho a Credito Fiscal)</a>
</div>

<br>
<table style="width: auto" class="simple">
    <tr class="simple">
        <td colspan="2" class="simple"><div style="width: 350px;"></div></td>
    </tr>
    <tr class="simple">
        <td class="simple">
            <b>Fecha:</b>
        </td>
        <td class="simple">
            {{ Carbon::parse($factura->FechaHra)->subHours(4)->format('Y-m-d, h:i:s') }}
        </td>
        <td class="simple">
            <b>NIT/CI/CEX:</b>
        </td>
        <td class="simple">
            43534532
        </td>
    </tr>
    <tr class="simple">
        <td class="simple">
            <b>Nombre/Razon Social:</b>
        </td>
        <td class="simple">
            ApellidoCliente
        </td>
        <td class="simple">
            <b>Cod. Cliente</b>
        </td>
        <td class="simple">
            CC-987239
        </td>
    </tr>
</table>

<div>
    <table class="products simple">
        <tr>
            <th><b>COD.<br>PRODUCTO/SERVICIO</b></th>
            <th><b>CANTIDAD</b></th>
            <th><b>DESCRIPCION</b></th>
            <th><b>PRECIO<br>UNITARIO</b></th>
            <th><b>DESCUENTO</b></th>
            <th><b>SUBTOTAL</b></th>
        </tr>
        @foreach($data as $item)
        <tr class="items">
            <td style="text-align: center">
                {{ $item->coditem }}
            </td>
            <td style="text-align: center">
                {{ $item->Cantidad }}
            </td>
            <td>
                {{ $item->Nombre }}
            </td>
            <td style="text-align: right">
                {{ number_format($item->PU, 2) }}
            </td>
            <td style="text-align: right">
                0.00
            </td>
            <td style="text-align: right">
                {{ number_format($item->PT, 2) }}
                @php $subtotal += $item->PT @endphp
            </td>
        </tr>
        @endforeach
        <tr>
            <td class="simple" colspan="3"></td>
            <td colspan="2" style="text-align: right">SUBTOTAL</td>
            <td style="text-align: right"> {{ number_format($subtotal, 2) }}</td>
        </tr>
        <tr>
            <td class="simple" colspan="3"></td>
            <td colspan="2" style="text-align: right">DESCUENTO</td>
            <td style="text-align: right"> {{ number_format($descuento, 2) }}</td>
        </tr>
        <tr>
            <td class="simple" colspan="3">
                Son
                @php
                    $formatterES = new NumberFormatter("es", NumberFormatter::SPELLOUT);
                    echo $formatterES->format((int)$subtotal-$descuento);
                @endphp
                {{ substr(number_format(($subtotal-$descuento) - (int)($subtotal-$descuento), 2), -2) }}
                /100 Bolivianos.
            </td>
            <td colspan="2" style="text-align: right">TOTAL</td>
            <td style="text-align: right"> {{ number_format($subtotal-$descuento, 2) }}</td>
        </tr>
        <tr>
            <td class="simple" colspan="3"></td>
            <td colspan="2" style="text-align: right">MONTO A PAGAR</td>
            <td style="text-align: right"> {{ number_format($subtotal-$descuento, 2) }}</td>
        </tr>
        <tr>
            <td class="simple" colspan="3"></td>
            <td colspan="2" style="text-align: right"><b>IMPORTE BASE CREDITO<br>FISCAL</b></td>
            <td style="text-align: right"> {{ number_format($subtotal-$descuento, 2) }}</td>
        </tr>
    </table>
</div>

<div style="text-align: center">
    <br><br><br>
    ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAÍS, EL USO ILÍCITO SERÁ SANCIONADO<br>PENALMENTE DE ACUERDO A LEY<br><br>
    Ley Nro 453: Tienes derecho a recibir información sobre las caracteristicas y contenidos de los<br>servicios que utilices.<br>
</div>
</body>
</html>
