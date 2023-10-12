<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear publicacion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('publicaciones.store') }}">
                        @csrf

                        <!-- Título -->
                        <div>
                            <x-input-label for="titulo" :value="__('Título')" />
                            <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')" required autofocus autocomplete="titulo" />
                            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
                        </div>

                        <!-- Contenido -->
                        <div class="mt-4">
                            <x-input-label for="contenido" :value="__('Contenido')" />
                            <x-text-input id="contenido" class="block mt-1 w-full" type="text" name="contenido" :value="old('contenido')" required autofocus autocomplete="contenido" />
                            <x-input-error :messages="$errors->get('contenido')" class="mt-2" />
                        </div>

                        {{-- <!-- Imagen -->
                        <div class="mt-4">
                            <x-input-label for="imagen" :value="__('Imagen URL')" />
                            <x-text-input id="imagen" class="block mt-1 w-full" type="text" name="imagen" :value="old('imagen')" required autofocus autocomplete="imagen" />
                            <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                        </div> --}}

                        <!-- Desde -->
                        <div class="mt-4">
                            <x-input-label for="desde" :value="__('Desde')" />
                            <x-text-input id="desde" class="block mt-1 w-full" type="date" name="desde"
                                :value="old('desde')" required autofocus autocomplete="desde" />
                            <x-input-error :messages="$errors->get('desde')" class="mt-2" />
                        </div>

                        <!-- Hasta -->
                        <div class="mt-4">
                            <x-input-label for="hasta" :value="__('Hasta')" />
                            <x-text-input id="hasta" class="block mt-1 w-full" type="date" name="hasta"
                                :value="old('hasta')" required autofocus autocomplete="hasta" />
                            <x-input-error :messages="$errors->get('hasta')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
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
