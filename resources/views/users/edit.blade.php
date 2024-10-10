<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('users.update', $user) }}">
            @csrf
            @method("patch")
            <select name="IdEmpleado" id="IdEmpleado">
                <option value=""></option>
                @foreach(App\Models\Empleado::all() as $empleado)
                    <option value="{{ $empleado->IdEmpleado }}">{{ App\Models\Persona::find($empleado->IdEmpleado)->Nombre }}</option>
                @endforeach
            </select>
            @unless($user->idrole == 2)
                <select name="idrole" id="idrole">
                    @foreach(App\Models\Role::all() as $role)
                        <option value="{{ $role->idrole }}">{{ $role->nombre }}</option>
                    @endforeach
                </select>
            @endunless
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Confirmar') }}</x-primary-button>
                <a
                    class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('users.index') }}">{{ __('Cancelar') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
