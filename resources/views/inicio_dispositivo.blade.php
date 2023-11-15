<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mt-4">
            <x-input-label for="codigo" :value="__('Codigo')" />

            <x-text-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" required
                autocomplete="codigo" />

            <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
        </div>

        <x-primary-button class="ml-3 m-7">
            {{ __('Iniciar sesión') }}
        </x-primary-button>
    </form>
</x-guest-layout>
