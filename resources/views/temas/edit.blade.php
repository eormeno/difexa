<x-app-layout>
    <x-slot name="header">
     <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Editar tema', ['tema' => $tema->titulo]) }}
     </h2>
    </x-slot>
   
    <div class="py-12">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
       <div class="p-6 text-gray-900 dark:text-gray-100">
        <form method="POST" action="{{ route('temas.update', $tema) }}" novalidate>
         @csrf
         @method('patch')
   
         <div>
          <x-input-label for="titulo" :value="__('Título')" />
          <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo"
           :value="old('titulo', $tema->titulo)" required autofocus autocomplete="titulo" />
          <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
         </div>
   
         <!-- Descripción -->
         <div class="mt-4">
          <x-input-label for="descripcion" :value="__('Descripción')" />
          <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion"
           :value="old('descripcion', $tema->descripcion)" required autofocus autocomplete="descripcion" />
          <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
         </div>
   
         <!-- Slug -->
         <div class="mt-4">
          <x-input-label for="slug" :value="__('Slug')" />
          <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug"
           :value="old('slug', $tema->slug)" required autofocus autocomplete="slug" />
          <x-input-error :messages="$errors->get('slug')" class="mt-2" />
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