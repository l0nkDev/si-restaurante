@php
    use App\Models\Inventario\Item;
    use App\Models\Cocina\Ingrediente;
    $item = Item::find($CodProd);
@endphp
<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

        <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Nuevo ingrediente para {{ $item->Nombre }} </h2>
        <br>
        <form method="POST" action="{{ route('contienes.store') }}">
            @csrf
            <input type="hidden" value="{{ $CodProd }}" name="CodProd">
            <x-input-label>Ingrediente:</x-input-label>
            <select name="CodIngr" id="CodIngr">
                <option value=""></option>
                @foreach(Ingrediente::all() as $ingrediente)
                        <?php $item = Item::find($ingrediente->CodProd) ?>
                    <option
                        value="{{ $ingrediente->CodIngr }}">{{ Item::find($ingrediente->CodIngr)->Nombre }}</option>
                @endforeach
            </select>
            <br><x-input-label>Cantidad:</x-input-label><x-text-input
                name="Cantidad" type="number"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            ></x-text-input><br/>
            <x-input-label>Unidad:</x-input-label>
            <x-text-input
                name="Unidad"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            ></x-text-input>
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Crear') }}</x-primary-button>
                <a
                    class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('ingredientes.index') }}">{{ __('Cancelar') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
