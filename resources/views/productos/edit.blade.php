<x-app-layout>
    <?php $item = App\Models\Item::find($producto->CodProd) ?>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('productos.update', $producto) }}">
            @csrf
            @method("patch")
            <textarea
                name="Nombre"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('Nombre', $item->Nombre) }}</textarea>
            <textarea
                name="Precio"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('Pombre', $producto->Precio) }}</textarea>
            <textarea
                name="Cantidad"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('Cantidad', $item->Cantidad) }}</textarea>
            <input type="checkbox" id="Disponible" name="Disponible">
            <label for="Disponible" class="text-gray-900 dark:text-white"> Disponible</label><br>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Confirmar') }}</x-primary-button>
                <a
                    class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('productos.index') }}">{{ __('Cancelar') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>