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
                    <div class="text-white bg-blue-600 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-block">
                        <a href="{{ route('publicaciones.create') }}">
                        <p>Alta Publicacion</p></a>
                    </div>
                    <div>
                        <div class="grid grid-cols-4 gap-5">
                            @forelse ($publicaciones as $publicacion)
                                <div class="rounded-xl bg-gray-300 shadow p-2">
                                    <a href="{{ route('publicaciones.edit', $publicacion) }}">
                                    <p
                                        class="text-white bg-gray-700 hover:bg-gray-600 cursor-pointer rounded-md text-center p-1 my-2 font-semibold">
                                        {{ $publicacion->titulo }}
                                    </p>
                                    <p
                                        class="text-gray-700 bg-gray-300 hover:bg-gray-400 cursor-pointer rounded-md text-center p-1 my-2">
                                        {{ $publicacion->tema->titulo }}
                                    </p>
                                    <p
                                        class="text-gray-700 bg-gray-300 hover:bg-gray-400 cursor-pointer rounded-md text-center p-1 my-2">
                                        {{ $publicacion->user->getFullName() }}
                                    </p>
                                    </a>
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