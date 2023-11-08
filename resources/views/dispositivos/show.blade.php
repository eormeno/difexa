<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <x-primary-button class="ml-3 m-7">
        {{ $publicacion }}
        {{$orden}}
    </x-primary-button>

    <script>
        function actualizarPagina() {
            window.location.href = '{{route('dispositivo.show', $dispositivo) }}/' + '{{$orden + 1}}';
            setTimeout(actualizarPagina, 1000);
        }
        window.onload = function() {
            setTimeout(actualizarPagina, 1000)
        };
    </script>

</x-guest-layout>
