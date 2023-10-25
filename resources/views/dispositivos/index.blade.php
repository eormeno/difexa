<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dispositivos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('exito'))
                <div class="relative">
                    <div class="absolute inset-0 flex justify-center items-end" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
                        <div class=" bg-green-200 p-3 border text-green-900 px-4 rounded-md" >
                            <p class="text-lg ">{{session('exito')}}</p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <a href="{{ route('dispositivos.create') }}">
                            <x-primary-button class="mb-3">     
                                <p>Crear dispositivo</p>    
                            </x-primary-button>
                        </a>
                        <div class="grid grid-cols-4 gap-5">
                            @forelse ($dispositivos as $dispositivo)
                                <div class="rounded-xl bg-gray-300 shadow p-2">
                                    <div class="group relative">
                                        <a href="{{ route('dispositivos.edit', $dispositivo) }}">
                                            <div class="bg-gray-700 hover:bg-gray-600 text-white text-center font-semibold p-2 rounded-lg transition duration-300">
                                                {{ $dispositivo->nombre }}
                                            </div>
                                        </a>
                                        <button class="hidden group-hover:block cursor-pointer absolute top-0 right-0 p-2 text-red-400 hover:text-red-500" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirmar-eliminacion-{{$dispositivo->id}}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>                                              
                                        </button>
                                    </div>
                                    <p class="text-gray-700 bg-gray-300 hover:bg-gray-400 cursor-pointer rounded-md text-center p-1 my-2">
                                        {{ $dispositivo->descripcion }}
                                    </p>
                                </div>
                                <x-modal name="confirmar-eliminacion-{{$dispositivo->id}}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                       <form method="post" action="{{ route('dispositivos.destroy', $dispositivo) }}" class="p-6">
                                          @csrf
                                          @method('delete')
                                          <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                             {{ __('Se eliminará el dispositivo') }} <span class="font-extrabold"> {{ $dispositivo->nombre }}</span>
                                          </h1>
                                          <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                             {{ __('¿Está seguro?') }}
                                          </h2>
                                          <div class="mt-6 flex justify-end">
                                             <x-secondary-button x-on:click="$dispatch('close')">
                                                {{ __('Cancelar') }}
                                             </x-secondary-button>
                                             <x-danger-button class="ml-3">
                                                {{ __('Sí, eliminar') }}
                                             </x-danger-button>
                                          </div>
                                       </form>
                                </x-modal>                                 
                            @empty
                                <div class="rounded-xl bg-gray-300 shadow p-2">
                                    <p
                                        class="text-white bg-gray-700 hover:bg-gray-600 cursor-pointer rounded-md text-center p-1 my-2 font-semibold">
                                        No hay dispositivos
                                    </p>
                                </div>
                            @endforelse
                        </div>

                        <div class="my-10">
                            {{ $dispositivos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>