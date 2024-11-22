@php
    use App\Models\Cocina\Ingrediente;use Illuminate\Support\Facades\DB;
    use \App\Models\Inventario\Item;
    use \App\Models\Cocina\Contiene;
@endphp
<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6">
            <div style="margin: 20px;">
                <div class="flex flex-row justify-between">
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Ingredientes de productos</h2>
                    <form method="GET" action="{{ route('ingredientes.create') }}">
                        <x-primary-button class="mt-4"
                                          style="margin-right: 2px">{{ __('NUEVO INGREDIENTE') }}</x-primary-button>
                    </form>
                </div>
                <div class="mt-6 bg-white rounded-lg divide-y">
                    <div style="height: 16px"></div>
                    <table style="width: calc(100% - 32px); margin: 16px;">
                        <thead>
                        <th scope="col" align="left">Producto</th>
                        <th scope="col" align="left">Ingredientes</th>
                        <th scope="col" align="left">Cantidad</th>
                        <th scope="col" align="left"></th>
                        </thead>
                        <tbody>
                        @foreach($productos as $producto)
                            @php $item = Item::find($producto->CodProd) @endphp
                            @php $contienes = DB::select('select * from contienes where contienes.CodProd = ' . $producto->CodProd) @endphp
                            <tr>
                                <td style="flex-grow: 4">{{ $item->Nombre }}</td>
                                <td style="flex-grow: 4"></td>
                                <td style="flex-grow: 4"></td>
                                <td style="flex-grow: 4"></td>
                                <td style="display: flex; justify-content: end">
                                <td>
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button style="margin-top: 10px; margin-left: 15px">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                                     viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/>
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('contienes.create', ['CodProd' => $producto->CodProd])">
                                                {{ __('Agregar') }}
                                            </x-dropdown-link>
                                        </x-slot>
                                    </x-dropdown>
                                </td>
                                </td>
                            </tr>
                            @foreach($contienes as $contiene)
                                @php $ingrediente = Ingrediente::find($contiene->CodIngr) @endphp
                                @php $ingit = Item::find($ingrediente->CodIngr) @endphp
                                <tr>
                                    <td style="flex-grow: 4"></td>
                                    <td style="flex-grow: 4">{{ $ingit->Nombre }}</td>
                                    <td style="flex-grow: 4">{{ $contiene->Cantidad }} {{ $contiene->Unidad }}</td>
                                    <td style="flex-grow: 4"></td>
                                    <td style="display: flex; justify-content: end">
                                    <td>
                                        <x-dropdown>
                                            <x-slot name="trigger">
                                                <button style="margin-top: 10px; margin-left: 15px">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                                         viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/>
                                                    </svg>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <form method="POST" action="{{ route('contienes.destroy', Contiene::find($contiene->id)) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <x-dropdown-link
                                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                                        {{ __('Eliminar') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                    <div style="height: 16px"></div>
                </div>
            </div>
        </div>

</x-app-layout>
