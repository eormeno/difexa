<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Información del perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Actualice la información de perfil y la dirección de correo electrónico de su cuenta.") }}
        </p>
    </header>
    @if (session('cambiarTema'))

    <x-modal name="confirmar-eliminacion-{{session('cambiarTema')->id}}" :show="True" focusable>
        <form method="post" action="{{ route('profile.cambiarTema', session('cambiarTema')) }}" class="p-6">
           @csrf
           @method('patch')
           <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">
              {{ __("Se cambiara el tema actual ") }}{{$user->tema->titulo}} al tema <span class="font-extrabold">{{session('cambiarTema')->titulo}}</span>
           </h1>
           <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
              {{ __('¿Está seguro?') }}
           </h2>
           <p class="text-md font-medium text-gray-800 dark:text-gray-100">
            {{ __('Si modifica el tema, debera esperar un tiempo hasta que su solicitud de cambio de tema sea aprobada.') }}
           </p>
           <div class="mt-6 flex justify-end">
              <x-secondary-button x-on:click="$dispatch('close')">
                 {{ __('Cancelar') }}
              </x-secondary-button>
              <x-primary-button class="ml-3">
                 {{ __('Cambiar Tema') }}
              </x-primary-button>
           </div>
        </form>
    </x-modal>
    @endif

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    @if (session('status') === 'profile-updated')
    <p
        x-data="{ show: true }"
        x-show="show"
        x-transition
        x-init="setTimeout(() => show = false, 5000)"
        class="text-lg text-green-600 dark:text-gray-400"
    >{{ __('Datos actualizados.') }}</p>
    @endif
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="apellido" :value="__('Apellido')" />
            <x-text-input id="apellido" name="apellido" type="text" class="mt-1 block w-full" :value="old('apellido', $user->apellido)" required autofocus autocomplete="apellido" />
            <x-input-error class="mt-2" :messages="$errors->get('apellido')" />
        </div>
        <div>
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre', $user->nombre)" required autocomplete="nombre" />
            <x-input-error class="mt-2" :messages="$errors->get('nombre')" />
        </div>
        <div>
            <x-input-label for="documento" :value="__('Documento')" />
            <x-text-input id="documento" name="documento" type="text" class="mt-1 block w-full" :value="old('documento', $user->documento)" required autocomplete="documento" />
            <x-input-error class="mt-2" :messages="$errors->get('documento')" />
        </div>

        <div>
            <x-input-label for="tema" :value="__('Tema')" />
                <select name="tema" id="tema" required class="border-gray-300 dark:border-gray-700 dark:text-gray-300border-gray-300 dark:bg-gray-900 dark:text-gray-300 focus:border-orange-500 dark:focus:border-orange-600 focus:ring-orange-500 dark:focus:ring-orange-600 rounded-md shadow-sm block mt-1 w-full">
                        @foreach ($temas as $tema)
                            @if ( $tema->id==$user->tema->id)
                                <option value="{{ $tema->id}}" selected>Tema Actual: {{ $tema->titulo }}</option>
                            @else
                                <option value="{{ $tema->id}}">{{ $tema->titulo }}</option>
                            @endif
                        @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('tema')" />
        </div>
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Su dirección de correo electrónico no está verificada.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 dark:focus:ring-offset-gray-800">
                            {{ __('Haga clic aquí para volver a enviar el correo electrónico de verificación.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>
        </div>
    </form>
</section>
