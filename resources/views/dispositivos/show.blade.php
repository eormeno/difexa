<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @if (is_string($publicacion))
        <p>{{ $publicacion }}.</p>   
    @else
        <div id="galeria" class="max-w-2xl mx-auto">
            <div class="publicacion w-full mb-4">
                <div class="bg-gray-700 hover:bg-gray-600 text-white text-center font-semibold p-2 rounded-lg transition duration-300">
                    {{ $publicacion->titulo }}
                </div>
                <img src="data:;base64,{{ $publicacion->imagen }}" alt="Imágen" class="rounded-lg shadow-md mt-4 mb-4 mx-auto max-w-90 max-h-90">
            </div>
        </div>
        <script>
            function actualizarPagina() {
                window.location.href = '{{route('dispositivo.show', $dispositivo) }}/' + '{{$orden + 1}}';
                setTimeout(actualizarPagina,  parseInt({{ $publicacion->duracion }})*1000);
            }
            window.onload = function() {
                setTimeout(actualizarPagina, parseInt({{ $publicacion->duracion }})*1000)
            };
        </script>   
    @endif


</x-guest-layout>