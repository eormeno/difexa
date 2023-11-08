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
                                :value="old('codigo', $dispositivo->codigo)" required autofocus autocomplete="codigo" maxlength="5" />
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
                                <x-input-label for="temas" :value="__('Agregar temas')" />
                                <select name="tema_nuevo" id="temas" required
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                                    onchange="
                                            window.location.href = '{{route('dispositivos.edit', [$dispositivo, 'add']) }}/' + this.value;
                                        ">
                                    <option value="">Seleccione un tema</option>
                                    @forelse ($temas as $tema)
                                        <option value="{{ $tema->id }}">{{ $tema->titulo }}</option>
                                    @empty
                                        <option value="">No hay temas disponibles</option>
                                    @endforelse
                                </select>

                                <div>
                                    @forelse ($temas_dispositivo as $tema_dispositivo)
                                        <x-dropdown-link :href="route('dispositivos.edit', [
                                            $dispositivo,
                                            'remove',
                                            $tema_dispositivo,
                                        ])">
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
