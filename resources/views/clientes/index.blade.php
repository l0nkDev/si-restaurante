<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6">
            <div style="margin: 20px;">
                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Administración de clientes</h2>
                    <form method="GET" action="{{ route('clientes.create') }}">
                        <x-primary-button class="mt-4" style="margin-right: 2px">{{ __('NUEVO CLIENTE') }}</x-primary-button>
                    </form>
                </div>
                <div class="mt-6 bg-white rounded-lg divide-y">
                    <div style="height: 16px"></div>
                    <table style="width: calc(100% - 32px); margin: 16px;">
                        <tbody>
                        @foreach($clientes as $cliente)
                                <?php $persona = App\Models\Persona::find($cliente->IdCliente) ?>
                                <tr>
                                    <td style="flex-grow: 4">{{ $persona->Nombre }}</td>
                                    <td style="flex-grow: 4">{{ $persona->CI }}</td>
                                    <td style="display: flex; justify-content: end">
                                        <a href="{{route('clientes.edit', $cliente)}}">
                                            <x-primary-button class="mt-4" style="margin: 2px">{{ __('Editar') }}</x-primary-button>
                                        </a>
                                        <form method="POST" action="{{ route('clientes.destroy', $cliente) }}">
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
