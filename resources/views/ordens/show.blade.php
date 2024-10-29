<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6">
            <div style="margin: 20px;">
                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Nueva orden para la mesa #
                        {{ App\Models\NotaVenta::find($orden->IDVenta)->NroMesa }}</h2>
                    <a href="{{ route('ordenas.create', ['NumOrden' => $orden->NumOrden]) }}">
                        <x-primary-button class="mt-4" style="margin-right: 2px">{{ __('AGREGAR PRODUCTO') }}</x-primary-button>
                    </a>
                </div>
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
                        <?php $total = 0.0 ?>
                        @foreach(App\Models\Ordena::all() as $ordena)
                            @if($ordena->NumOrden == $orden->NumOrden)
                            <?php
                                $producto = App\Models\Producto::find($ordena->CodProd);
                                $item = App\Models\Item::find($producto->CodProd);
                                $total = $total + ($producto->Precio * $ordena->Cantidad);
                            ?>
                            <tr>
                                <td style="flex-grow: 4">{{ $item->Nombre }}</td>
                                <td style="flex-grow: 4">{{ $producto->Precio }}</td>
                                <td style="flex-grow: 4">{{ $ordena->Cantidad }}</td>
                                <td style="flex-grow: 4">{{ $ordena->SubTotal }}</td>
                                <td style="display: flex; justify-content: end">
                                    <form method="POST" action="{{ route('ordenas.destroy', $ordena) }}">
                                        @csrf
                                        @method('delete')
                                        <x-primary-button class="mt-4" style="margin: 2px">{{ __('Eliminar') }}</x-primary-button>
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
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Subtotal: {{ $total }}</h2>
                    <div class="mt-4 space-x-2">
                        <a href="{{ route('nota_ventas.show', App\Models\NotaVenta::find($orden->IDVenta)) }}">
                            <x-primary-button>{{ __('Confirmar') }}</x-primary-button>
                        </a>
                        <a
                            class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ route('ordens.destroy', $orden) }}">{{ __('Cancelar') }}</a>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
