<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6">
            <div style="margin: 20px;">
                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Administración de usuarios</h2>
                </div>
                <div class="mt-6 bg-white rounded-lg divide-y">
                    <div style="height: 16px"></div>
                    <table style="width: calc(100% - 32px); margin: 16px;">
                        <tbody>
                        @foreach($users as $user)
                                <?php $persona = App\Models\Persona::find($user->IdEmpleado) ?>
                                <?php $rol = App\Models\Role::find($user->idrole) ?>
                                <tr>
                                    <td style="flex-grow: 4">{{ $user->name }}</td>
                                    <td style="flex-grow: 4">{{ $user->email }}</td>
                                    <td style="flex-grow: 4">{{ $persona != null ? $persona->Nombre : ""}}</td>
                                    <td style="flex-grow: 4">{{ $rol->nombre }}</td>
                                    <td style="display: flex; justify-content: end">
                                        <a href="{{route('users.edit', $user)}}">
                                            <x-primary-button class="mt-4" style="margin: 2px">{{ __('Editar') }}</x-primary-button>
                                        </a>
                                        @unless($rol->nombre == "Administración")
                                            <form method="POST" action="{{ route('users.destroy', $user) }}">
                                                @csrf
                                                @method('delete')
                                                <x-primary-button class="mt-4" style="margin: 2px">{{ __('Eliminar') }}</x-primary-button>
                                            </form>
                                        @endunless
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
