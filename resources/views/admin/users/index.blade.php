<x-app-layout>
    <div class="mx-auto p-4 sm:p-6 lg:p-8" style="max-width: 52rem">
        <div class="mt-7">
            <div style="margin: 20px;">
                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Usuarios</h2>
                    <div>
                        <a href="{{ route('empleados.index') }}">
                            <x-primary-button class="mt-4"
                                              style="margin-right: 2px">{{ __('EMPLEADOS') }}</x-primary-button>
                        </a>
                        <a href="{{ route('roles.index') }}">
                            <x-primary-button class="mt-4"
                                              style="margin-right: 2px">{{ __('ROLES') }}</x-primary-button>
                        </a>
                    </div>
                </div>
                <div class="mt-6 bg-white rounded-lg divide-y">
                    <div style="height: 16px"></div>
                    <table style="width: calc(100% - 32px); margin: 16px;">
                        <thead>
                        <th scope="col" align="left">Usuario</th>
                        <th scope="col" align="left">Correo</th>
                        <th scope="col" align="left">Nombre</th>
                        <th scope="col" align="left">Rol</th>
                        <th scope="col" align="left"></th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                                <?php $persona = \App\Models\Admin\Persona::find($user->IdEmpleado) ?>
                                <?php $rol = \App\Models\Admin\Role::find($user->idrole) ?>
                            <tr>
                                <td style="flex-grow: 4">{{ $user->name }}</td>
                                <td style="flex-grow: 4">{{ $user->email }}</td>
                                <td style="flex-grow: 4">{{ $persona != null ? $persona->Nombre : ""}}</td>
                                <td style="flex-grow: 4">{{ $rol->nombre }}</td>
                                <td>
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button style="margin-top: 10px; margin-left: 15px">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                                     viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/>
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('users.edit', $user)">
                                                {{ __('Editar') }}
                                            </x-dropdown-link>
                                        </x-slot>
                                    </x-dropdown>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="height: 16px"></div>
                </div>
                <div>
                    <a href="{{ route('menu.index') }}">
                        <x-primary-button class="mt-4"
                                          style="margin-right: 2px">{{ __('GESTIONAR MENU') }}</x-primary-button>
                    </a>
                    <a href="{{ route('bitacora.index') }}">
                        <x-primary-button class="mt-4"
                                          style="margin-right: 2px">{{ __('VER BITÁCORA') }}</x-primary-button>
                    </a>
                </div>
            </div>
        </div>

</x-app-layout>
