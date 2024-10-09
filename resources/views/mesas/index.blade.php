<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6">
            <div style="margin: 20px;">
                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Administración de mesas</h2>
                    <form method="GET" action="{{ route('mesas.create') }}">
                        <x-primary-button class="mt-4" style="margin-right: 2px">{{ __('NUEVA MESA') }}</x-primary-button>
                    </form>
                </div>
                <div class="mt-6 bg-white rounded-lg divide-y">
                    <div style="height: 16px"></div>
                    <table style="width: calc(100% - 32px); margin: 16px;">
                        <tbody>
                        @foreach($mesas as $mesa)
                            <tr>
                                <td style="flex-grow: 4">Mesa #{{ $mesa->NroMesa }}</td>
                                <td style="flex-grow: 4">{{ $mesa->Capacidad }}</td>
                                <td style="display: flex; justify-content: end">
                                    <a href="{{route('mesas.edit', $mesa)}}">
                                        <x-primary-button class="mt-4" style="margin: 2px">{{ __('Editar') }}</x-primary-button>
                                    </a>
                                    <form method="POST" action="{{ route('mesas.destroy', $mesa) }}">
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
