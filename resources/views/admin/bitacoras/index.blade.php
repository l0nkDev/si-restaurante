<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($bitacoras as $bitacora)
                <div class="p-6 flex space-x-2">
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $bitacora->Username }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{ $bitacora->created_at->subHours(4)->format('j M Y, g:i a') }}</small>
                                <small class="text-sm text-gray-600"> &middot; {{ $bitacora->IP }}</small>
                            </div>
                        </div>
                        <?php
                            $action = $bitacora->Action;
                            if (strcmp($action, "I") == 1)
                                $text = 'Insertó "' . $bitacora->Row . '" en la tabla ' . $bitacora->Table . '.';
                            elseif (strcmp($action, "E") == 1)
                                $text = 'Editó "' . $bitacora->Row . '" en la tabla ' . $bitacora->Table . '.';
                            elseif (strcmp($action, "D") == 1)
                                $text = 'Eliminó "' . $bitacora->Row . '" en la tabla ' . $bitacora->Table . '.';
                            elseif (strcmp($action, "L") == 1)
                                $text = 'Inició sesión.';
                            elseif (strcmp($action, "O") == 1)
                                $text = 'Cerró sesión.';
                        ?>
                        <p class="mt-4 text-lg text-gray-900">{{ $text }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
