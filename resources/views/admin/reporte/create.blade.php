<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('reporte.store') }}">
            @csrf
            <x-input-label>Tabla:</x-input-label>
            <select name="Tipo" id="Tipo">
                <!-- <option value="nota_ventas">Notas de venta</option>
                <option value="nota_compras">Notas de compra</option>
                <option value="nota_salidas">Notas de salida</option>
                <option value="salida_cocinas">Salidas de cocina</option> -->
                <option value="bitacoras">Entradas de bitácora</option>
            </select>
            <br><br><x-input-label>Desde:</x-input-label>
            <input type="date" id="FirstDat" name="FirstDat">
            <br><br><x-input-label>Hasta:</x-input-label>
            <input type="date" id="LastDat" name="LastDat">
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Crear') }}</x-primary-button>
                <a
                    class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('reporte.index') }}">{{ __('Cancelar') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
