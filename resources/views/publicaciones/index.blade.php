<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Publicaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <div class="grid grid-cols-4 gap-5">
                            @forelse ($publicaciones as $publicacion)
                                <div class="rounded-xl bg-gray-300 shadow p-2">
                                    <a href="{{ route('publicaciones.show', $publicacion) }}">
                                    <p
                                        class="text-white bg-gray-700 hover:bg-gray-600 cursor-pointer rounded-md text-center p-1 my-2 font-semibold">
                                        {{ $publicacion->titulo }}
                                    </p>
                                    </a>
                                    <p
                                        class="text-gray-700 bg-gray-300 rounded-md text-center p-1 my-2">
                                        <span class="font-semibold">Tema:</span> {{ $publicacion->tema->titulo }}
                                    </p>
                                </div>
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