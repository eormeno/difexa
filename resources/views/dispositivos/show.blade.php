<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col items-center pt-1 bg-gray-100 dark:bg-gray-900">
            <div class="w-auto h-full mx-auto px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden rounded-sm mt-auto mb-auto">
                @if($publicacion != null)
                    <div class="relative" style="height: 90vh;">
                        <img src="data:;base64,{{ $publicacion->imagen }}" alt="Imagen de la Publicación" class="h-full w-full ">
                        <div class="absolute bottom-0 right-0 p-4 bg-white shadow-md rounded-sm text-black">
                            <p class="pl-7 block font-medium text-sm text-black-700 dark:text-black-300 text-right">{{ $publicacion->contenido }}</p>
                        </div>
                    </div>
                    <script>
                        function actualizarPagina() {
                            window.location.href = '{{ route('dispositivo.show', [$dispositivo, $orden + 1]) }}';
                            setTimeout(actualizarPagina, 10000);
                        }
                        window.onload = function() {
                            setTimeout(actualizarPagina, 10000)
                        };
                    </script>
                @else
                    <button class="ml-3 m-7 text-white">
                        {{ __('No hay publicaciones') }}
                    </button>
                @endif
            </div>
        </div>
    </body>
</html>
