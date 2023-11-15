<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Solicitudes para publicar') }}
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
                    <div>
                        <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-5">
                            @forelse ($usuarios as $usuario)
                            <div class="grid content-between rounded-xl bg-gray-300 shadow p-2">
                                <p class="text-white bg-gray-700 hover:bg-gray-600 rounded-md text-center p-1 font-semibold">
                                    {{ $usuario->getFullName() }}
                                </p>
                                <p class="text-gray-700 bg-gray-300 rounded-md text-center p-1">
                                    {{ $usuario->email }}
                                    <br>
                                    {{ number_format($usuario->documento,0,",",".") }}
                                    <br>
                                    {{ $usuario->tema->titulo}}
                                </p>
                                <div class="flex justify-evenly p-1">
                                    <a href="{{ route ('usuarios.show', $usuario )}}">
                                        <x-secondary-button>
                                            {{ __('Ver') }}
                                        </x-secondary-button>
                                    </a>
                                    <a href="{{ route('usuarios.edit', $usuario) }}">
                                        <x-secondary-button>
                                            {{ __('Editar') }}
                                        </x-secondary-button>
                                    </a>
                                    <button class="inline-flex items-center px-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150 hover:text-green-500" x-data=""  x-on:click.prevent="$dispatch('open-modal', 'confirmar-verificacion-{{$usuario->id}}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                                    </button>
                                    <button class="inline-flex items-center px-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150 hover:text-red-500" x-data=""  x-on:click.prevent="$dispatch('open-modal', 'confirmar-eliminacion-{{$usuario->id}}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                                    </button>
                                </div>
                            </div>

                                <x-modal name="confirmar-eliminacion-{{ $usuario->id }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                    <form method="post" action="{{ route('usuarios.destroy', $usuario) }}" class="p-6">
                                        @csrf
                                        @method('delete')
                                        <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                            {{ __('Se eliminará el usuario') }}
                                            <span class="font-extrabold"> {{ $usuario->getFullName() }}</span>
                                        </h1>
                                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                            {{ __('¿Está seguro?') }}
                                        </h2>
                                        <div class="mt-6 flex justify-end">
                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                {{ __('Cancelar') }}
                                            </x-secondary-button>
                                            <x-danger-button class="ml-3">
                                                {{ __('Eliminar') }}
                                            </x-danger-button>
                                        </div>
                                    </form>
                                </x-modal>

                                <x-modal name="confirmar-verificacion-{{ $usuario->id }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                    <form method="post" action="{{ route('usuarios.verificar', $usuario) }}" class="p-6">
                                        @csrf
                                        @method('patch')
                                        <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                            {{ __('Se verificara el usuario') }}
                                            <span class="font-extrabold"> {{ $usuario->getFullName() }}</span>
                                        </h1>
                                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                            {{ __('¿Está seguro?') }}
                                        </h2>
                                        <div class="mt-6 flex justify-end">
                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                {{ __('Cancelar') }}
                                            </x-secondary-button>
                                            <x-confirm-button class="ml-3">
                                                {{ __('Confirmar') }}
                                            </x-confirm-button>
                                        </div>
                                    </form>
                                </x-modal>

                            @empty
                            <div class="rounded-xl bg-gray-300 shadow p-2">
                                <p class="text-white bg-gray-700 hover:bg-gray-600 rounded-md text-center p-1 my-2 font-semibold">
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
