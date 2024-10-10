<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6">
            <div style="margin: 20px;">
                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Administración de productos</h2>
                    <form method="GET" action="{{ route('productos.create') }}">
                        <x-primary-button class="mt-4" style="margin-right: 2px">{{ __('NUEVO PRODUCTO') }}</x-primary-button>
                    </form>
                </div>
                <div class="mt-6 bg-white rounded-lg divide-y">
                    <div style="height: 16px"></div>
                    <table style="width: calc(100% - 32px); margin: 16px;">
                        <tbody>
                        @foreach($productos as $producto)
                                <?php $item = App\Models\Item::find($producto->CodProd) ?>
                                <tr>
                                    <td style="flex-grow: 4">{{ $item->Nombre }}</td>
                                    <td style="flex-grow: 4">{{ $producto->Precio }}</td>
                                    <td style="flex-grow: 4">{{ $item->Cantidad }}</td>
                                    <td style="flex-grow: 4">{{ $item->Disponible == 1 ? 'Si' : 'No' }}</td>
                                    <td style="display: flex; justify-content: end">
                                        <a href="{{route('productos.edit', $producto)}}">
                                            <x-primary-button class="mt-4" style="margin: 2px">{{ __('Editar') }}</x-primary-button>
                                        </a>
                                        <form method="POST" action="{{ route('productos.destroy', $producto) }}">
                                            @csrf
                                            @method('delete')
                                            <x-primary-button class="mt-4" style="margin: 2px">{{ __('Eliminar') }}</x-primary-button>
                                        </form>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="height: 16px"></div>
                </div>
            </div>
        </div>

</x-app-layout>
