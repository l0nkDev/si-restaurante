@php
    use App\Models\Inventario\Item;
    use App\Models\Inventario\NotaSalida;
    use Carbon\Carbon;
@endphp
<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6">
            <div style="margin: 20px;">
                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Reportes</h2>
                    <form method="GET" action="{{ route('reporte.create') }}">
                        <x-primary-button class="mt-4"
                                          style="margin-right: 2px">{{ __('NUEVO REPORTE') }}</x-primary-button>
                    </form>
                </div>
                <div class="mt-6 bg-white rounded-lg divide-y">
                    <div style="height: 16px"></div>
                    <table style="width: calc(100% - 32px); margin: 16px;">
                        <thead>
                        <tr>
                            <th scope="col" align="left">Tabla</th>
                            <th scope="col" align="left">Desde</th>
                            <th scope="col" align="left">Hasta</th>
                            <th scope="col" align="left">Creado</th>
                            <th scope="col" align="left"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reportes as $reporte)
                                <tr>
                                    <td style="flex-grow: 4">{{ $reporte->Tipo }}</td>
                                    <td style="flex-grow: 4">{{ Carbon::parse($reporte->FirstDat)->subHours(4)->format('j M Y') }}</td>
                                    <td style="flex-grow: 4">{{ Carbon::parse($reporte->LastDat)->subHours(4)->format('j M Y') }}</td>
                                    <td style="flex-grow: 4">{{ Carbon::parse($reporte->FechaHra)->subHours(4)->format('j M Y, g:i a') }}</td>
                                    <td style="display: flex; justify-content: end">
                                        <form method="GET" action="{{ route('reporte.show', $reporte) }}">
                                            @csrf
                                            <x-primary-button class="mt-4"
                                                              style="margin: 2px">{{ __('Ver') }}</x-primary-button>
                                        </form>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="height: 16px"></div>
                </div>
                <div class="flex flex-row justify-between">
                </div>
            </div>
        </div>
</x-app-layout>
