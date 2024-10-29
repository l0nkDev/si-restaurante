<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6">
            <div style="margin: 20px;">
                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Administración de empleados</h2>
                    <form method="GET" action="{{ route('empleados.create') }}">
                        <x-primary-button class="mt-4" style="margin-right: 2px">{{ __('NUEVO EMPLEADO') }}</x-primary-button>
                    </form>
                </div>
                <div class="mt-6 bg-white rounded-lg divide-y">
                    <div style="height: 16px"></div>
                    <table style="width: calc(100% - 32px); margin: 16px;">
                        <thead>
                            <th scope="col" align="left">Nombre</th>
                            <th scope="col" align="left">CI</th>
                            <th scope="col" align="left">Teléfono</th>
                            <th scope="col" align="left"></th>
                        </thead>
                        <tbody>
                        @foreach($empleados as $empleado)
                                <?php $persona = App\Models\Persona::find($empleado->IdEmpleado) ?>
                                <tr>
                                    <td style="flex-grow: 4">{{ $persona->Nombre }}</td>
                                    <td style="flex-grow: 4">{{ $persona->CI }}</td>
                                    <td style="flex-grow: 4">{{ $empleado->Telefono }}</td>
                                    <td>
                                        <x-dropdown>
                                            <x-slot name="trigger">
                                                <button style="margin-top: 10px; margin-left: 15px">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-dropdown-link :href="route('empleados.edit', $empleado)">
                                                    {{ __('Editar') }}
                                                </x-dropdown-link>
                                                <form method="POST" action="{{ route('empleados.destroy', $empleado) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <x-dropdown-link onclick="event.preventDefault(); this.closest('form').submit();">
                                                        {{ __('Eliminar') }}
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
