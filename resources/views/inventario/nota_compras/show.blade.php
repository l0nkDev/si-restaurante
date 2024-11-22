@php
    use App\Models\Inventario\Item;
    use App\Models\Inventario\Proveedor;
    use App\Models\Inventario\ProdEntrante;
@endphp
<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6">
            <div style="margin: 20px;">
                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Compra
                        a {{ Proveedor::find($notaCompra->CodProv)->Descripcion }}</h2>
                    <a href="{{ route('producto_entrante.create', ['IdCompra' => $notaCompra->IdCompra]) }}">
                        <x-primary-button class="mt-4"
                                          style="margin-right: 2px">{{ __('AGREGAR PRODUCTO') }}</x-primary-button>
                    </a>
                </div>
                <div class="mt-6 bg-white rounded-lg divide-y">
                    <div style="height: 16px"></div>
                    @php $total = 0 @endphp
                    <table style="width: calc(100% - 32px); margin: 16px;">
                        <thead>
                        <tr>
                            <th scope="col" align="left">Producto</th>
                            <th scope="col" align="left">Cantidad</th>
                            <th scope="col" align="left">Costo</th>
                            <th scope="col" align="left"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(ProdEntrante::all() as $entrada)
                            @if($entrada->IdCompra == $notaCompra->IdCompra)
                                    <?php
                                    $total += $entrada->Costo;
                                    $item = Item::find($entrada->CodItem);
                                    ?>
                                <tr>
                                    <td style="flex-grow: 4">{{ $item->Nombre }}</td>
                                    <td style="flex-grow: 4">{{ $entrada->Cantidad }}</td>
                                    <td style="flex-grow: 4">{{ $entrada->Costo }}</td>
                                    <td style="display: flex; justify-content: end">
                                        <form method="POST" action="{{ route('producto_entrante.destroy', $entrada) }}">
                                            @csrf
                                            @method('delete')
                                            <x-primary-button class="mt-4"
                                                              style="margin: 2px">{{ __('Eliminar') }}</x-primary-button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    <div style="height: 16px"></div>
                </div>
                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Total: {{ $total }}</h2>
                    @php $notaCompra->Total = $total; $notaCompra->save(); @endphp
                </div>
            </div>
        </div>
</x-app-layout>
