@php
    use Carbon\Carbon;
@endphp
<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6">
            <div style="margin: 20px;">
                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Notas de venta</h2>
                </div>
                <div class="mt-6 bg-white rounded-lg divide-y">
                    <div style="height: 16px"></div>
                    @php $total = 0 @endphp
                    <table style="width: calc(100% - 32px); margin: 16px;">
                        <thead>
                        <tr>
                            <th scope="col" align="left">Mesa</th>
                            <th scope="col" align="left">Total</th>
                            <th scope="col" align="left">Fecha</th>
                            <th scope="col" align="left">Pagada</th>
                            <th scope="col" align="left"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notaventas as $notaventa)
                                <tr>
                                    <td style="flex-grow: 4">{{ $notaventa->NroMesa }}</td>
                                    <td style="flex-grow: 4">{{ $notaventa->Total }}</td>
                                    <td style="flex-grow: 4">{{ Carbon::parse($notaventa->FechaHora)->subHours(4)->format('j M Y, g:i a') }}</td>
                                    <td style="flex-grow: 4">{{ $notaventa->FuePagado == 0 ? "No" : "Si" }}</td>
                                    <td style="display: flex; justify-content: end">
                                        <form method="GET" action="{{ route('nota_ventas.show', $notaventa) }}">
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
