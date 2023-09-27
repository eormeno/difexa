<x-guest-layout>
    <div>
            <div class="grid grid-cols-4 gap-5">
                @forelse ($publicaciones as $publicacion)
                    <div class="rounded-xl bg-gray-300 shadow p-2">
                        <p
                            class="text-white bg-gray-700 hover:bg-gray-600 cursor-pointer rounded-md text-center p-1 my-2 font-semibold">
                            {{ $publicacion->titulo }}
                        </p>
                        {{-- una clase tailwind con un border redondeado y un fondo color de gris --}}
                        
                        <p class=" mt-2 text-gray-700 p-2 text-center">
                            {{ $publicacion->tema->titulo }}
                        </p>
                        <p class="mt-2 text-gray-700 rounded-xl border-red-500 bg-gray-400 shadow p-2">
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