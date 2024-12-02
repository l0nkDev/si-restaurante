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
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Notas de salida</h2>
                </div>
                <div class="mt-6 bg-white rounded-lg divide-y">
                    <div style="height: 16px"></div>
                    <table style="width: calc(100% - 32px); margin: 16px;">
                        <thead>
                        <tr>
                            <th scope="col" align="left">Item</th>
                            <th scope="col" align="left">Total</th>
                            <th scope="col" align="left">Fecha</th>
                            <th scope="col" align="left"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notasalidas as $notaSalida)
                                    @php
                                        $item = Item::find($notaSalida->CodItem)
                                    @endphp
                                <tr>
                                    <td style="flex-grow: 4">{{ $item->Nombre }}</td>
                                    <td style="flex-grow: 4">{{ $notaSalida->Cantidad }}</td>
                                    <td style="flex-grow: 4">{{ Carbon::parse($notaSalida->FechaHra)->subHours(4)->format('j M Y, g:i a') }}</td>
                                    <td style="display: flex; justify-content: end">
                                        <form method="POST" action="{{ route('nota_salida.destroy', $notaSalida) }}">
                                            @csrf
                                            @method('delete')
                                            <x-primary-button class="mt-4"
                                                              style="margin: 2px">{{ __('Eliminar') }}</x-primary-button>
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
