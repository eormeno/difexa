<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Temas') }}
        </h2>
    </x-slot>
    <div class="py-12">
        @if (session('exito'))
            <div class="relative">
                <div class="absolute inset-0 flex justify-center items-end" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
                    <div class=" bg-green-200 p-3 border text-green-900 px-4 rounded-md" >
                        <p class="text-lg ">{{session('exito')}}</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <a href="{{ route('temas.create') }}">
                            <x-primary-button class="mb-3">     
                                <p>Crear tema</p>    
                            </x-primary-button>
                        </a>
                        <div class="grid grid-cols-4 gap-5">
                            @forelse ($temas as $tema)
                                <div class="rounded-xl bg-gray-200 shadow p-2">
                                    <a href="{{ route('temas.edit', $tema) }}">
                                        <p
                                            class="text-white bg-gray-700 hover:bg-gray-600 cursor-pointer rounded-md text-center p-1 my-2 font-semibold">
                                            {{ $tema->titulo }}
                                        </p>
                                    </a>
                                </div>
                            @empty
                                <p>No hay temas</p>
                            @endforelse
                        </div>

                        <div class="my-10">
                            {{ $temas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>