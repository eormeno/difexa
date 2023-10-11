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
                                    <div class="rounded-xl bg-gray-300 shadow p-2 ">
                                        <p class="text-white bg-gray-700 hover:bg-gray-600 rounded-md text-center p-1 my-2 font-semibold">
                                            {{ $publicacion->titulo }}
                                        </p>
                                        <p class="text-gray-700 bg-gray-300 rounded-md text-center p-1 my-2">
                                            {{ $publicacion->tema->titulo }}
                                        </p>
                                        <div class="flex justify-evenly m-0 a-0">
                                            <a href="{{ route('publicaciones.show', $publicacion->id) }}">
                                                <div class="text-gray-900 bg-white rounded-md px-3 py-1 hover:bg-gray-600 hover:text-gray-200 border border-gray-600">
                                                    Ver
                                                </div>
                                            </a>
                                            <a href="{{ route('publicaciones.edit', $publicacion->id) }}">
                                                <div class="text-gray-900 bg-white rounded-md px-3 py-1 hover:bg-gray-600 hover:text-gray-200 border border-gray-600">
                                                    Editar
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                <div class="rounded-xl bg-gray-300 shadow p-2">
                                    <p class="text-white bg-gray-700 hover:bg-gray-600 rounded-md text-center p-1 my-2 font-semibold">
                                        No hay publicaciones
                                    </p>
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
