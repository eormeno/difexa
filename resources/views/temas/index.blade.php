<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Temas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session()->has('success'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-green-400 text-gray-800 font-extrabold p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="pb-5">
                        <a href="{{ route('temas.create') }}">
                            <x-primary-button>
                                {{ __('Crear tema') }}
                            </x-primary-button>
                        </a>
                    </div>
                    <div class="grid grid-cols-4 gap-5">
                        @forelse ($temas as $tema)
                                <div class="rounded-xl bg-gray-300 shadow p-2">
                                    <p class="text-white bg-gray-700 hover:bg-gray-600 rounded-md text-center p-1 my-2 font-semibold">
                                        {{ $tema->titulo }}
                                    </p>
                                    <div class="flex justify-evenly m-0 a-0">
                                        <a href="{{ route ('temas.show', $tema->id )}}">
                                            <x-secondary-button>
                                                {{ __('Ver') }}
                                            </x-secondary-button>
                                        </a>
                                        <a href="{{ route('temas.edit', $tema->id) }}">
                                            <x-secondary-button>
                                                {{ __('Editar') }}
                                            </x-secondary-button>
                                        </a>
                                    </div>
                                </div>
                            @empty
                            <div class="rounded-xl bg-gray-300 shadow p-2">
                                <p class="text-white bg-gray-700 hover:bg-gray-600 rounded-md text-center p-1 my-2 font-semibold">
                                    No hay temas
                                </p>
                            </div>
                        @endforelse
                    </div>
                    <div class="my-10">
                        {{ $temas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
