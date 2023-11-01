<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar dispositivo', ['dispositivo' => $dispositivo->titulo]) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('dispositivos.update', $dispositivo) }}" novalidate>
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="nombre" :value="__('Nombre')" />
                            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                                :value="old('nombre', $dispositivo->nombre)" required autofocus autocomplete="nombre" />
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        </div>

                        <div class="flex">
                            <!-- Descripción -->
                            <div class="mt-4 w-1/2 pr-4">
                                <x-input-label for="descripcion" :value="__('Descripción')" />
                                <textarea id="descripcion"
                                    class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    type="text" name="descripcion" required autofocus rows="5" cols="50" autocomplete="descripcion">{{ old('descripcion', $dispositivo->descripcion) }}</textarea>
                                <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                            </div>
                            <div class="mt-4 w-1/2">
                                <div class="relative group">
                                    <button class="bg-blue-500 text-white p-2">Abrir Menú</button>
                                    <ul
                                        class="absolute hidden mt-2 p-2 border border-gray-300 bg-white group-hover:block">
                                        <!-- Coloca aquí tus elementos de menú -->
                                        <li><a href="#">Opción 1</a></li>
                                        <li><a href="#">Opción 2</a></li>
                                        <li><a href="#">Opción 3</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Guardar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
