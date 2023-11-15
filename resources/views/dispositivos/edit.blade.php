<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Dispositivos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('dispositivos.update', $dispositivo) }}" novalidate>
                        @csrf
                        @method('patch')

                        <!-- Nombre -->
                        <div>
                            <x-input-label for="nombre" :value="__('Nombre del Dispositivo')" />
                            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                                :value="old('nombre', $dispositivo->nombre)" required autofocus autocomplete="nombre" />
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        </div>

                        <!-- Descripcion -->
                        <div class="grid grid-cols-2">
                            <!-- Descripción -->
                            <div class="mt-4 pr-4">
                                <x-input-label for="descripcion" :value="__('Descripción')" />
                                <textarea id="descripcion" class="block mt-1 w-full dark:bg-gray-800" type="text" name="descripcion" required autofocus
                                    autocomplete="descripcion">{{ old('descripcion', $dispositivo->descripcion) }}</textarea>
                                <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                            </div>
                            <div class="mt-2">
                                <div class="flex items-center  space-x-4">
                                    <div class="w-full mt-2">
                                        <x-input-label for="tema" :value="__('Temas')" />
                                        <select name="tema" id="tema" required
                                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                            <option value="" selected>Seleccionar un tema</option>
                                            @foreach ($temasDisponibles as $tema)
                                                <option value="{{ $tema->id }}">{{ $tema->titulo }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error class="mt-2" :messages="$errors->get('tema')" />
                                    </div>
                                    <div class="flex items-center mt-7">
                                        <x-primary-button name="boton" value="Agregar" style="background-color: #64F065;">{{ __('Agregar') }}
                                        </x-primary-button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <x-input-label class="mt-5" for="temas" :value="__('Temas asignados')" />
                                    @if ($dispositivo->temas->count() > 0)
                                        @foreach ($dispositivo->temas as $tema)
                                            <input type="checkbox" name="temas[]" value="{{ $tema->id }}" 
                                                id="tema_{{ $tema->id }}">
                                            <labelfor="tema_{{ $tema->id }}">{{ $tema->titulo }}</label><br>
                                        @endforeach
                                    @else
                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">No hay temas asignados.
                                        </p>
                                    @endif
                                    <x-danger-button class="mt-4" name="boton"
                                        value="Eliminar">{{ __('Eliminar') }} </x-danger-button>
                                </div>
                            </div>


                            <div class="flex items-center justify-end mt-10 h-7">
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
