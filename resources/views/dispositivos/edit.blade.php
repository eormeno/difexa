<x-app-layout>
 <x-slot name="header">
  <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
   {{ __('Editar Dispositivo', ['dispositivo' => $dispositivo->nombre]) }}
  </h2>
 </x-slot>

 <div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
   <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
     <form method="POST" action="{{ route('dispositivos.update', $dispositivo) }}" novalidate>
      @csrf
      @method('patch')

      <div>
       <x-input-label for="nombre" :value="__('Nombre')" />
       <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
        :value="old('nombre', $dispositivo->nombre)" required autofocus autocomplete="nombre" />
       <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
      </div>

      <!-- Descripción -->
      <div class="mt-4">
       <x-input-label for="descripcion" :value="__('Descripción')" />
       <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion"
        :value="old('descripcion', $dispositivo->descripcion)" required autofocus autocomplete="descripcion" />
       <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
      </div>

      <div class="flex items-center justify-end mt-4">
       <x-primary-button class="ml-4">
        {{ __('Guardar') }}
       </x-primary-button>
      </div>
     </form>
    </div>
   </div>
  </div>
 </div>
</x-app-layout>
