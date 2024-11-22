<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6">
            <div style="margin: 20px;">
                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Ingresos totales</h2>
                    <a href="{{ route('clientes.index') }}">
                        <x-primary-button class="mt-4"
                                          style="margin-right: 2px">{{ __('CLIENTES') }}</x-primary-button>
                    </a>
                </div>
                <div class="mt-6 bg-white rounded-lg divide-y">
                    <div style="height: 16px"></div>
                    <table style="width: calc(100% - 32px); margin: 16px;">
                        <thead>
                        <tr>
                            <th scope="col" align="left">Producto</th>
                            <th scope="col" align="left">Precio U.</th>
                            <th scope="col" align="left">Cantidad</th>
                            <th scope="col" align="left">Precio</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $total = 0.0 ?>
                        @foreach($items as $item)
                            <?php $total += $item->Total ?>
                                <tr>
                                    <td style="flex-grow: 4">{{ $item->Nombre }}</td>
                                    <td style="flex-grow: 4">{{ $item->Precio }}</td>
                                    <td style="flex-grow: 4">{{ $item->Cantidad }}</td>
                                    <td style="flex-grow: 4">{{ $item->Total }}</td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="height: 16px"></div>
                </div>
                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Total: {{ $total }}</h2>
                    <div class="mt-4 space-x-2">
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
