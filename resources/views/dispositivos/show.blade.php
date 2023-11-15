<x-guest-layout>

    <div class="rounded-xl bg-gray-300 shadow p-2">
        <p class="text-white bg-gray-700 rounded-md text-center p-1 my-2 font-semibold">
            {{ $publicacion->titulo }}
        </p>
        <p class="text-gray-700 bg-gray-300 rounded-md text-center p-1 my-2">
            {{ $publicacion->contenido }}
        </p>
        <p class="text-gray-700 bg-gray-300 rounded-md text-center p-1 my-2">
            {{ $publicacion->tema->titulo }}
        </p>
        <img class="ml-auto mr-auto h-auto max-w-full rounded-md" src="{{ $publicacion->imagen }}">
        <p class="text-gray-700 bg-gray-300 rounded-md text-center p-1 my-2">
            {{ $publicacion->user->getfullName() }}
        </p>
    </div>

    <script>
        function actualizarPagina() {
            window.location.href = '{{ route('dispositivos.show', $dispositivo) }}/' + '{{ $orden + 1 }}';
            setTimeout(actualizarPagina, 5000);
        }
        window.onload = function() {
            setTimeout(actualizarPagina, 5000)
        };
    </script>

</x-guest-layout>
