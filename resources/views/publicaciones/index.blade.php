<x-guest-layout>
    <div class="text-4xl font-bold text-center mb-5 white">
        Publicaciones
    </div>
    <div>
        <div class="grid grid-cols-4 gap-5">
            @forelse ($publicaciones as $publicacion)
                <div class="rounded-xl bg-gray-300 shadow p-2">
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
                </div>
            @empty
                <div class="rounded-xl bg-gray-300 shadow p-2">
                    <p
                        class="text-white bg-gray-700 hover:bg-gray-600 cursor-pointer rounded-md text-center p-1 my-2 font-semibold">
                        No hay publicaciones
                    </p>
                </div>
            @endforelse
        </div>

        <div class="my-10">
            {{ $publicaciones->links() }}
        </div>
    </div>
</x-guest-layout>
