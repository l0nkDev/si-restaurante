<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('productos.store') }}">
            @csrf
            <x-input-label>Nombre:</x-input-label>
            <x-text-input
                name="Nombre"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            ></x-text-input>
            <br/><x-input-label>Precio:</x-input-label>
            <x-text-input
                name="Precio"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            ></x-text-input>
            <br/><x-input-label>Cantidad:</x-input-label>
            <x-text-input
                name="Cantidad" type="number" min="0" max="100"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            ><br/>
            <div class="flex flex-row">
                <x-input-label>Disponible:</x-input-label>
                <input type="checkbox" id="Disponible" name="Disponible"><br>
            </div>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Crear') }}</x-primary-button>
                <a
                    class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('productos.index') }}">{{ __('Cancelar') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
