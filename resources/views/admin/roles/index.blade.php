<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6">
            <div style="margin: 20px;">
                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Administración de roles</h2>
                    <form method="GET" action="{{ route('roles.create') }}">
                        <x-primary-button class="mt-4" style="margin-right: 2px">{{ __('NUEVO ROL') }}</x-primary-button>
                    </form>
                </div>
                <div class="mt-6 bg-white rounded-lg divide-y">
                    <div style="height: 16px"></div>
                    <table style="width: calc(100% - 32px); margin: 16px;">
                        <thead>
                            <th scope="col" align="left">Nombre</th>
                            <th scope="col" align="left"></th>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            @unless( $role->nombre == "Invitado")
                                <tr>
                                    <td style="flex-grow: 4">{{ $role->nombre }}</td>
                                    <td style="display: flex; justify-content: end">
                                        @if($role->nombre == "Administración")
                                            <div style="height: 34px"></div>
                                        @else
                                            <a href="{{route('roles.edit', $role)}}">
                                                <x-primary-button class="mt-4" style="margin: 2px">{{ __('Editar') }}</x-primary-button>
                                            </a>
                                            <form method="POST" action="{{ route('roles.destroy', $role) }}">
                                                @csrf
                                                @method('delete')
                                                <x-primary-button class="mt-4" style="margin: 2px">{{ __('Eliminar') }}</x-primary-button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endunless
                        @endforeach
                        </tbody>
                    </table>
                    <div style="height: 16px"></div>
                </div>
            </div>
        </div>

</x-app-layout>
