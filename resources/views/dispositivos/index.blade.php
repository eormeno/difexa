<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dispositivos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <div class="grid grid-cols-4 gap-5">
                            @forelse ($dispositivos as $dispositivo)
                                <div class="rounded-xl bg-gray-300 shadow p-2">
                                    <div class="group relative">
                                        <a href="{{ route('dispositivos.edit', $dispositivo) }}">
                                            <div
                                                class="bg-gray-800 text-white p-2 rounded-lg
                                                 hover:bg-gray-600 transition duration-300">
                                                {{ $dispositivo->nombre }}</div>
                                        </a>
                                        <button
                                            class="hidden group-hover:block cursor-pointer absolute top-0 right-0 p-2 text-red-400 hover:text-red-600" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-dispositivo-deletion-{{ $dispositivo->id }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-6 h-6">
                                                <path fill-rule="evenodd"
                                                    d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                    <p
                                        class="text-gray-700 bg-gray-300 hover:bg-gray-400 cursor-pointer rounded-md text-center p-1 my-2">
                                        {{ $dispositivo->descripcion }}
                                    </p>
                                </div>

                                <x-modal name="confirm-dispositivo-deletion-{{ $dispositivo->id }}" :show="$errors->userDeletion->isNotEmpty()"
                                    focusable>
                                    <form method="post" action="{{ route('dispositivos.destroy', $dispositivo) }}"
                                        class="p-6">
                                        @csrf
                                        @method('delete')
                                        <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                            {{ __('Se eliminará el dispositivo') }}
                                            <span class="font-extrabold"> <span class="text-red-400">"{{ $dispositivo->nombre }}"<span></span>
                                        </h1>

                                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                            {{ __('¿Está seguro?') }}
                                        </h2>

                                        <div class="mt-6 flex justify-end">
                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                {{ __('Cancelar') }}
                                            </x-secondary-button>

                                            <x-danger-button class="ml-3">
                                                {{ __('Sí, eliminar') }}
                                            </x-danger-button>
                                        </div>
                                    </form>
                                </x-modal>

                                
                            @empty
                                <div class="rounded-xl bg-gray-300 shadow p-2">
                                    <p
                                        class="text-white bg-gray-700 hover:bg-gray-600 cursor-pointer rounded-md text-center p-1 my-2 font-semibold">
                                        No hay dispositivos
                                    </p>
                                </div>
                            @endforelse
                        </div>

                        <div class="my-10">
                            {{ $dispositivos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
