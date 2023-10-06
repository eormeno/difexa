<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dispositivo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="rounded-xl bg-gray-300 shadow p-2">
                        <p class="text-white bg-gray-700 rounded-md text-center p-1 my-2 font-semibold">
                            {{ $dispositivo->nombre }}
                        </p>
                        <p class="text-gray-700 bg-gray-300 rounded-md text-center p-1 my-2">
                            {{ $dispositivo->descripcion }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
