<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <div style="margin: 20px">
                <div class="flex flex-row">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900">Administración de roles</h2>
                    <form method="HEAD" action="{{ route('roles.create') }}">
                        <x-primary-button class="mt-4">{{ __('Nuevo') }}</x-primary-button>
                    </form>
                </div>
                <table class="table" style="width: 100%">
                    <thead>
                    <tr>
                        <th scope="col" class="text-start">Nombre</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->nombre }}</td>
                            <td>
                                @unless( $role->nombre == "Sin rol")
                                    <x-primary-button class="mt-4">{{ __('Editar') }}</x-primary-button>
                                    <x-primary-button class="mt-4">{{ __('Eliminar') }}</x-primary-button>
                                @endunless
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</x-app-layout>
