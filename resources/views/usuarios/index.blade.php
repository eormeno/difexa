<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Solicitudes para publicar') }}
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
              <div class="grid grid-cols-4 gap-5">
                @forelse ($usuarios as $usuario)
                  <div class="rounded-xl bg-gray-300 shadow p-2">
                    <div class="group relative">
                      <a href="LLENAR AQUI">
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
                       absolute top-0 right-8 p-2 text-green-400 hover:text-green-500"
                       x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-usuario-verificacion-{{ $usuario->id }}')"
                       >
                        
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                        </svg>                        
                      </button>
                      <button
                        class="hidden group-hover:block cursor-pointer
                       absolute top-0 right-0 p-2 text-red-400 hover:text-red-500"
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-usuario-deletion-{{ $usuario->id }}')">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                          fill="currentColor" class="w-6 h-6">
                          <path fill-rule="evenodd"
                            d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                            clip-rule="evenodd" />
                        </svg>
                      </button>
                    </div>
                    <p
                      class="text-gray-700 bg-gray-300 hover:bg-gray-400 cursor-pointer rounded-md text-center p-1 my-2 font-extrabold">
                      {{ $usuario->tema->titulo }}
                    </p>
                  </div>
                  <x-modal name="confirm-usuario-verificacion-{{ $usuario->id }}" :show="$errors->userDeletion->isNotEmpty()"
                    focusable>
                    <form method="post" action="{{ route('usuarios.verificado', $usuario) }}" class="p-6">
                      @csrf
                      @method('patch')
                      <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Se verificara el usuario') }}
                        <span class="font-extrabold"> {{ $usuario->nombre }}</span>
                      </h1>
    
                      <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('¿Está seguro?') }}
                      </h2>
    
                      <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                          {{ __('No') }}
                        </x-secondary-button>
    
                        <x-primary-button class="ml-3">
                          {{ __('Sí, verificar') }}
                        </x-primary-button>
                      </div>
                    </form>
                  </x-modal>
                  <x-modal name="confirm-usuario-deletion-{{ $usuario->id }}" :show="$errors->userDeletion->isNotEmpty()"
                    focusable>
                    <form method="post" action="" class="p-6">
                      @csrf
                      @method('delete')
                      <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Se eliminará el usuario') }}
                        <span class="font-extrabold"> {{ $usuario->nombre }}</span>
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