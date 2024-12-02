@php
    use App\Models\Inventario\Item;
    use App\Models\Inventario\Producto;
    use App\Models\Lugar\Orden;
    use App\Models\Lugar\Ordena;
    use App\Models\Caja\Factura;
@endphp
<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6">
            <div style="margin: 20px;">
                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Nota de venta en la mesa
                        #{{ $notaVenta->NroMesa }}</h2>
                    <a href="{{ route('nota_ventas.index') }}">
                        <x-primary-button class="mt-4" style="margin-right: 2px">{{ __('VOLVER') }}</x-primary-button>
                    </a>
                    @if($notaVenta->FuePagado == 0)
                        <form method="POST" action="{{ route('ordens.store', ['IDVenta' => $notaVenta->IDVenta]) }}">
                            @csrf
                            <x-primary-button class="mt-4"
                                              style="margin-right: 2px">{{ __('NUEVA ORDEN') }}</x-primary-button>
                        </form>
                    @endif
                </div>
                <?php $total = 0.0 ?>
                @foreach(Orden::all() as $orden)
                    @if($orden->IDVenta == $notaVenta->IDVenta)
                        <div class="mt-6 bg-white rounded-lg divide-y">
                            <div style="height: 16px"></div>
                            <table style="width: calc(100% - 32px); margin: 16px;">
                                <thead>
                                <tr>
                                    <th scope="col" align="left">Nombre</th>
                                    <th scope="col" align="left">Precio U.</th>
                                    <th scope="col" align="left">Cantidad</th>
                                    <th scope="col" align="left">Precio</th>
                                    <th scope="col" align="left"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Ordena::all() as $ordena)
                                    @if($ordena->NumOrden == $orden->NumOrden)
                                            <?php
                                            $total = $total + $ordena->SubTotal;
                                            $producto = Producto::find($ordena->CodProd);
                                            $item = Item::find($producto->CodProd)
                                            ?>
                                        <tr>
                                            <td style="flex-grow: 4">{{ $item->Nombre }}</td>
                                            <td style="flex-grow: 4">{{ $producto->Precio }}</td>
                                            <td style="flex-grow: 4">{{ $ordena->Cantidad }}</td>
                                            <td style="flex-grow: 4">{{ $ordena->SubTotal }}</td>
                                            <td style="display: flex; justify-content: end">
                                                @if($notaVenta->FuePagado == 0)
                                                    <form method="POST" action="{{ route('ordenas.destroy', $ordena) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <x-primary-button class="mt-4"
                                                                          style="margin: 2px">{{ __('Eliminar') }}</x-primary-button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            <div style="height: 16px"></div>
                        </div>
                    @endif
                @endforeach
                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Total: {{ $total }}</h2>
                    @php
                        $notaVenta->Total = $total; $notaVenta->save();
                        $factura = Factura::where('IDVenta', '=', $notaVenta->IDVenta);
                    @endphp
                    @if($notaVenta->FuePagado == 0)
                        <form method="POST" action="{{ route('nota_ventas.update', $notaVenta) }}">
                            @csrf
                            @method("patch")
                            <input type="hidden" value="{{ $total }}" name="total">
                            <x-primary-button class="mt-4" style="margin-right: 2px">{{ __('PAGAR') }}</x-primary-button>
                        </form>
                    @elseif(!$factura->exists())
                        <form method="POST" action="{{ route('factura.store', $notaVenta) }}">
                            @csrf
                            <input type="hidden" value="{{ $notaVenta->IDVenta }}" name="IDVenta">
                            <input type="hidden" value="{{ $total }}" name="Monto">
                            <x-primary-button class="mt-4" style="margin-right: 2px">{{ __('GENERAR FACTURA') }}</x-primary-button>
                        </form>
                    @else
                        <form method="GET" action="{{ route('factura.show', $factura->first()) }}">
                            @csrf
                            <x-primary-button class="mt-4" style="margin-right: 2px">{{ __('MOSTRAR FACTURA') }}</x-primary-button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
</x-app-layout>
