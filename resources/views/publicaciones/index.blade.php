<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Publicaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session()->has('success'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-green-400 text-gray-800 font-extrabold p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <div class="grid grid-cols-4 gap-5">
                            @forelse ($publicaciones as $publicacion)
                                <div class="rounded-xl bg-gray-300 shadow p-2">
                                    <div class="group relative">
                                        <a href="{{ route('publicaciones.edit', $publicacion) }}">
                                            <div class="bg-gray-500 text-white p-2 rounded-lg hover:bg-gray-700 transition duration-300">
                                            {{ $publicacion->titulo }}
                                            </div>
                                        </a>
                                        <button class="hidden group-hover:block cursor-pointer absolute top-0 right-0 p-2 text-gray-400 hover:text-red-500" x-data="" x-on:click.prevent="$dispatch('open-modal','confirmar-eliminacion-{{$publicacion->id}}')">
                                        <!-- Agregar aquí el ícono de https://heroicons.com  -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>

                                        </button>
                                    </div>
                                    <p class="text-gray-700 bg-gray-300 rounded-md text-center p-1 my-2">
                                        {{ $publicacion->contenido }}
                                    </p>
                                </div>
                                <!-- Agregar aquí el componente modal -->
                                <x-modal name="confirmar-eliminacion-{{$publicacion->id}}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                    <form method="post" action="{{ route('publicaciones.destroy', $publicacion) }}" class="p-6">
                                        @csrf
                                        @method('delete')
                                        <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                            {{ __('Se eliminará el publicacion') }}
                                            <span class="font-extrabold"> {{ $publicacion->nombre }}</span>
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
                                <p>No hay publicaciones</p>
                            @endforelse
                        </div>

                        <div class="my-10">
                            {{ $publicaciones->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>