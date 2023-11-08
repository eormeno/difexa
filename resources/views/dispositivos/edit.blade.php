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
                        <div class="mt-4">
                            <x-input-label for="codigo" :value="__('Código')" />
                            <x-text-input id="codigo" class="block mt-1 w-full" type="text" name="codigo"
                                :value="old('codigo', $dispositivo->codigo)" required autofocus autocomplete="codigo"
                                maxlength="5" />
                            <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
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
                                <x-dropdown align="left" width="100">
                                    <x-slot name="trigger">
                                        <x-secondary-button>
                                            {{ __('Tema') }}
                                            <svg class="w-5 h-5 ml-2 -mr-1" x-description="Heroicon name: chevron-down"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10.293 14.707a1 1 0 010-1.414L14.586 10A1 1 0 1116 11.414l-5.293 5.293a1 1 0 01-1.414 0L4 11.414A1 1 0 115.414 10l5.293 5.293z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </x-secondary-button>
                                    </x-slot>
                                    <x-slot name="content">
                                        @forelse ($temas as $tema)
                                            <x-dropdown-link :href="route('dispositivos.edit', [$dispositivo, 'add', $tema])">
                                                {{ __($tema->titulo) }}
                                            </x-dropdown-link>
                                        @empty
                                            <x-dropdown-link>
                                                {{ __('No hay temas disponibles') }}
                                            </x-dropdown-link>
                                        @endforelse
                                    </x-slot>
                                </x-dropdown>
                                <div>
                                    @forelse ($temas_dispositivo as $tema_dispositivo)
                                        <x-dropdown-link :href="route('dispositivos.edit', [
                                            $dispositivo, 'remove', $tema_dispositivo])">
                                            {{ __($tema_dispositivo->titulo) }}
                                        </x-dropdown-link>
                                    @empty
                                        <x-dropdown-link>
                                            {{ __('No tiene temas seleccionados') }}
                                        </x-dropdown-link>
                                    @endforelse
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
