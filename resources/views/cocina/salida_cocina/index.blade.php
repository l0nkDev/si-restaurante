@php
    use App\Models\Inventario\Item;
    use App\Models\Inventario\Producto;
    use App\Models\Lugar\EstadoOrden;
    use App\Models\Lugar\NotaVenta;
@endphp
<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6">
            <div style="margin: 20px;">
                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Salidas de cocina</h2>
                </div>
                @foreach($ordens as $orden)
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{ EstadoOrden::find($orden->IdEstado)->Nombre }}
                        pedido para mesa #{{ NotaVenta::find($orden->IDVenta)->NroMesa }}</h2>
                    <div class="mt-6 bg-white rounded-lg divide-y">
                        <div style="height: 16px"></div>
                        <table style="width: calc(100% - 32px); margin: 16px;">
                            <thead>
                            <tr>
                                <th scope="col" align="left">Nombre</th>
                                <th scope="col" align="left">Precio U.</th>
                                <th scope="col" align="left">Cantidad</th>
                                <th scope="col" align="left">Precio</th>
                                <th scope="col" align="left">
                                    @if($orden->IdEstado != 4)
                                        <x-dropdown>
                                            <x-slot name="trigger">
                                                <button style="margin-top: 10px; margin-left: 15px">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-dropdown-link :href="route('salida_cocina.create', ['IdEstado' => 2, 'NumOrden' => $orden->NumOrden])">
                                                    {{ __('Preparando') }}
                                                </x-dropdown-link>
                                                <x-dropdown-link :href="route('salida_cocina.create', ['IdEstado' => 3, 'NumOrden' => $orden->NumOrden])">
                                                    {{ __('Listo') }}
                                                </x-dropdown-link>
                                                <form method="POST" action="{{ route('salida_cocina.store') }}">
                                                    @csrf
                                                    <input type="hidden" value="{{ $orden->NumOrden }}" name="NumOrden">
                                                    <x-dropdown-link onclick="event.preventDefault(); this.closest('form').submit();">
                                                        {{ __('Entregar') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                    @endif
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0.0 ?>
                            @foreach(\App\Models\Lugar\Ordena::all() as $ordena)
                                @if($ordena->NumOrden == $orden->NumOrden)
                                        <?php
                                        $producto = Producto::find($ordena->CodProd);
                                        $item = Item::find($producto->CodProd);
                                        $total = $total + ($producto->Precio * $ordena->Cantidad);
                                        ?>
                                    <tr>
                                        <td style="flex-grow: 4">{{ $item->Nombre }}</td>
                                        <td style="flex-grow: 4">{{ $producto->Precio }}</td>
                                        <td style="flex-grow: 4">{{ $ordena->Cantidad }}</td>
                                        <td style="flex-grow: 4">{{ $ordena->SubTotal }}</td>
                                        <td style="display: flex; justify-content: end"></td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <div style="height: 16px"></div>
                    </div>
                @endforeach
            </div>
        </div>
</x-app-layout>
