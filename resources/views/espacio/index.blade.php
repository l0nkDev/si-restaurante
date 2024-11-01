<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6">
            <div style="margin: 20px;">
                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Espacio disponible</h2>
                    <a href="{{ route('mesas.index') }}">
                        <x-primary-button class="mt-4" style="margin-right: 2px">{{ __('VOLVER') }}</x-primary-button>
                    </a>
                </div>
                <div class="mt-6 bg-white rounded-lg divide-y">
                    <div style="height: 16px"></div>
                    <table style="width: calc(100% - 32px); margin: 16px;">
                        <thead>
                            <tr>
                                <th scope="col" align="left">Número de Mesa</th>
                                <th scope="col" align="left">Capacidad</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $espacio = 0; ?>
                        @foreach($mesas as $mesa)
                        <?php
                            $tmp = App\Models\NotaVenta::where(['NroMesa' => $mesa->NroMesa, 'FuePagado' => 0])->first();
                        ?>
                            @if(is_null($tmp))
                            <tr>
                                <td style="flex-grow: 4">Mesa #{{ $mesa->NroMesa }}</td>
                                <td style="flex-grow: 4">{{ $mesa->Capacidad }}</td>
                                <td style="display: flex; justify-content: end">
                                <?php $espacio += $mesa->Capacidad ?>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    <div style="height: 16px"></div>
                </div>

                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Espacio total: {{ $espacio }}</h2>
                </div>
            </div>
        </div>
</x-app-layout>
