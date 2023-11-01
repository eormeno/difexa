<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Solicitudes para publicar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <div class="grid grid-cols-4 gap-5">
                            @forelse ($usuarios as $usuario)
                                <div class="rounded-xl bg-gray-300 shadow p-2">
                                    <div class="group relative">
                                        <a href="LLENAR AQUÍ">
                                            <div
                                                class="bg-gray-500 text-white p-2 rounded-lg
                           hover:bg-gray-700 transition duration-300">
                                                {{ $usuario->getFullName() }}</div>
                                        </a>
                                        <div class="py-4">
                                            <p><span>email: </span>{{ $usuario->email }}</p>
                                            <p><span>documento: </span>{{ $usuario->documento }}</p>
                                        </div>
                                        <button
                                            class="hidden group-hover:block cursor-pointer
                   absolute top-0 right-8 p-2 text-green-700 hover:text-green-500"
                                            x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'confirm-usuario-aprobar-{{ $usuario->id }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-6 h-6">
                                                <path fill-rule="evenodd"
                                                    d="M9 1.5H5.625c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5zm6.61 10.936a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 14.47a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                                    clip-rule="evenodd" />
                                                <path
                                                    d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <p
                                        class="text-gray-700 bg-gray-300 hover:bg-gray-400 cursor-pointer rounded-md text-center p-1 my-2 font-extrabold">
                                        {{ $usuario->tema->titulo }}
                                    </p>
                                </div>
                                <x-modal name="confirm-usuario-aprobar-{{ $usuario->id }}" :show="$errors->userDeletion->isNotEmpty()"
                                    focusable>
                                    <form method="post" action="{{ route('usuarios.aprobar', $usuario) }}" class="p-6">
                                        @csrf
                                        @method('patch')
                                        <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                            {{ __('Vas a otorgar permiso para publicar al usuario') }}
                                            <span class="font-extrabold"> {{ $usuario->getFullName() }}</span>
                                            {{ __(' en el tema ') }}
                                            <span class="font-extrabold"> "{{ $usuario->tema->titulo }}"</span>
                                        </h1>

                                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                            {{ __('¿Estás seguro?') }}
                                        </h2>

                                        <div class="mt-6 flex justify-end">
                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                {{ __('Cancelar') }}
                                            </x-secondary-button>

                                            <x-danger-button class="ml-3">
                                                {{ __('Sí, aprobar') }}
                                            </x-danger-button>
                                        </div>
                                    </form>
                                </x-modal>
                            @empty
                                <div class="rounded-xl bg-gray-300 shadow p-2">
                                    <p
                                        class="text-white bg-gray-700 hover:bg-gray-600 cursor-pointer rounded-md text-center p-1 my-2 font-semibold">
                                        No hay usuarios
                                    </p>
                                </div>
                            @endforelse
                        </div>

                        <div class="my-10">
                            {{ $usuarios->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
