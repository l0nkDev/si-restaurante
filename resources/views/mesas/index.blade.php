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
                        <?php
                        $tmp = App\Models\NotaVenta::where(['NroMesa' => $mesa->NroMesa, 'FuePagado' => 0])->first();
                        ?>
                            <tr>
                                <td style="flex-grow: 4">Mesa #{{ $mesa->NroMesa }}</td>
                                <td style="flex-grow: 4">{{ $mesa->Capacidad }}</td>
                                <td style="display: flex; justify-content: end">
                                    <a href="{{ is_null($tmp) ? route('nota_ventas.create', ['NroMesa' => $mesa->NroMesa]) :
                                        route('nota_ventas.show', $tmp ) }}">
                                        <x-primary-button class="mt-4 disabled" style="margin: 2px">
                                            {{ is_null($tmp) ? "CREAR NOTA" : "VER NOTA" }}
                                        </x-primary-button>
                                    </a>
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('mesas.edit', $mesa)">
                                                {{ __('Edit') }}
                                            </x-dropdown-link>
                                            <form method="POST" action="{{ route('mesas.destroy', $mesa) }}">
                                                @csrf
                                                @method('delete')
                                                <x-dropdown-link :href="route('mesas.destroy', $mesa)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Delete') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
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
