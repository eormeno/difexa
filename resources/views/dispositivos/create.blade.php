<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Dispositivo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('dispositivos.store') }}">
                        @csrf

                        <!-- Nombre -->
                        <div>
                            <x-input-label for="nombre" :value="__('Nombre')" />
                            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        </div>
                        <!-- Código -->
                        <div class="mt-4">
                            <x-input-label for="codigo" :value="__('Código')" />
                            <x-text-input id="codigo" class="block mt-1 w-full text-transform: uppercase" type="text" name="codigo"
                                :value="old('codigo')" maxlength=5 required autofocus autocomplete="codigo"
                                maxlength="5" />
                            <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
                        </div>

                        <div class="flex">
                            <!-- Descripción -->
                            <div class="mt-4 w-1/2 pr-4">
                                <x-input-label for="descripcion" :value="__('Descripción')" />
                                <textarea id="descripcion"
                                    class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    type="text" name="descripcion" :value="old('descripcion')" required autofocus rows="5" cols="50" autocomplete="descripcion"></textarea>
                                <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                            </div>
                            <div class="mt-4 w-1/2">
                                <div class="flex items-center  space-x-4">
                                <div class="w-full">
                                    <x-input-label for="tema" :value="__('Temas')" />
                                    <select name="tema" id="temas" :value="old('tema')" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                        <option value="" selected>Seleccionar un tema</option>    
                                    @foreach ($temas as $tema)
                                            <option value="{{ $tema->id }}">{{ $tema->titulo }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error class="mt-2" :messages="$errors->get('tema')" />
                                </div>
                                </div>
                            </div>
                        </div>
        </div>

                        <div class="flex items-center justify-end mt-4 p-5">
                            <x-primary-button class="ml-4">
                                {{ __('Crear') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>