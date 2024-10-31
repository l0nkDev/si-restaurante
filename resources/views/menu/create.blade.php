<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('menu.store') }}">
            @csrf
            <x-input-label>Producto:</x-input-label>
            <select name="CodProd" id="CodProd">
                <option value=""></option>
                @foreach(App\Models\Producto::all() as $producto)
                        <?php $item = App\Models\Item::find($producto->CodProd) ?>
                    <option value="{{ $producto->CodProd }}">{{ App\Models\Item::find($producto->CodProd)->Nombre }}</option>
                @endforeach
            </select>
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Confirmar') }}</x-primary-button>
                <a
                    class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('menu.index') }}">{{ __('Cancelar') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
