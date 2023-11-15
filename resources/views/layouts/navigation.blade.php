<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <div > 
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="isolation:isolate" width="150" height="35" viewBox="8 2 107.313 28" ><g><g><path d=" M 103.824 21.895 L 76.517 21.895 C 76.343 21.895 76.209 21.761 76.209 21.587 L 76.209 5.042 C 76.209 4.868 76.343 4.734 76.517 4.734 L 103.833 4.734 C 104.007 4.734 104.141 4.868 104.141 5.042 L 104.141 21.587 C 104.136 21.759 103.995 21.896 103.824 21.895 L 103.824 21.895 Z  M 76.825 21.279 L 103.525 21.279 L 103.525 5.35 L 76.825 5.35 L 76.825 21.279 Z " fill="rgb(235,151,40)"/><path d=" M 106.384 2 L 73.956 2 C 73.619 2 73.34 2.279 73.34 2.616 L 73.34 24.023 C 73.34 24.36 73.619 24.639 73.956 24.639 L 82.609 24.639 L 82.609 26.131 C 82.609 26.468 82.889 26.747 83.226 26.747 L 96.807 26.747 C 97.144 26.747 97.423 26.468 97.423 26.131 L 97.423 24.639 L 106.384 24.639 C 106.721 24.639 107 24.36 107 24.023 L 107 2.616 C 107 2.27 106.721 2 106.384 2 Z  M 96.191 25.515 L 83.842 25.515 L 83.842 24.639 L 96.191 24.639 L 96.191 25.515 L 96.191 25.515 Z  M 105.768 23.407 L 97.057 23.407 C 96.896 23.343 96.717 23.343 96.557 23.407 L 83.466 23.407 C 83.305 23.343 83.126 23.343 82.966 23.407 L 74.563 23.407 L 74.563 3.232 L 105.758 3.232 L 105.758 23.407 L 105.768 23.407 L 105.768 23.407 Z  M 101.437 26.063 C 101.1 26.063 100.821 26.342 100.821 26.679 L 100.821 28.768 L 79.52 28.768 L 79.52 26.679 C 79.52 26.342 79.241 26.063 78.904 26.063 C 78.567 26.063 78.288 26.342 78.288 26.679 L 78.288 29.384 C 78.288 29.721 78.567 30 78.904 30 L 101.446 30 C 101.783 30 102.062 29.721 102.062 29.384 L 102.062 26.679 C 102.053 26.342 101.783 26.063 101.437 26.063 L 101.437 26.063 Z " fill="rgb(62,80,98)"/><path d=" M 88.527 7.483 L 88.527 8.578 L 86.611 8.578 C 85.856 8.578 85.242 9.191 85.242 9.947 L 85.242 12.137 L 83.873 12.137 L 83.873 14.875 L 87.159 14.875 L 87.159 12.137 L 85.79 12.137 L 85.79 9.947 C 85.79 9.494 86.159 9.125 86.611 9.125 L 88.527 9.125 L 88.527 10.22 L 91.813 10.22 L 91.813 7.483 L 88.527 7.483 Z  M 89.075 8.03 L 91.265 8.03 L 91.265 9.673 L 89.075 9.673 L 89.075 8.03 Z  M 92.36 8.578 L 92.36 9.125 L 93.729 9.125 C 94.182 9.125 94.551 9.494 94.551 9.947 L 94.551 12.137 L 93.182 12.137 L 93.182 14.875 L 96.467 14.875 L 96.467 12.137 L 95.098 12.137 L 95.098 9.947 C 95.098 9.191 94.484 8.578 93.729 8.578 L 92.36 8.578 Z  M 84.421 12.684 L 86.611 12.684 L 86.611 14.327 L 84.421 14.327 L 84.421 12.684 Z  M 93.729 12.684 L 95.92 12.684 L 95.92 14.327 L 93.729 14.327 L 93.729 12.684 Z  M 85.242 15.422 L 85.242 17.065 C 85.242 17.82 85.856 18.434 86.611 18.434 L 88.527 18.434 L 88.527 19.529 L 91.813 19.529 L 91.813 16.791 L 88.527 16.791 L 88.527 17.886 L 86.611 17.886 C 86.159 17.886 85.79 17.517 85.79 17.065 L 85.79 15.422 L 85.242 15.422 Z  M 94.551 15.422 L 94.551 17.065 C 94.551 17.517 94.182 17.886 93.729 17.886 L 92.36 17.886 L 92.36 18.434 L 93.729 18.434 C 94.484 18.434 95.098 17.82 95.098 17.065 L 95.098 15.422 L 94.551 15.422 Z  M 89.075 17.339 L 91.265 17.339 L 91.265 18.982 L 89.075 18.982 L 89.075 17.339 Z " fill="rgb(252,140,42)"/></g><g clip-path="url(#_clipPath_YeqWX5fL8TeWqkMLRiVcszDfSlWKQNCX)"><text transform="matrix(1,0,0,1,-0.313,22.793)" style="font-weight:700;font-size:24px;font-style:normal;fill:#fc8c2a;stroke:none;">Difexa</text></g><defs><clipPath id="_clipPath_YeqWX5fL8TeWqkMLRiVcszDfSlWKQNCX"><rect x="0" y="0" width="77.654" height="21" transform="matrix(1,0,0,1,-0.313,3)"/></clipPath></defs></g></svg>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Panel') }}
                    </x-nav-link>
                </div>
                @if (Auth::user()->is_admin)
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('temas.index')" :active="request()->routeIs('temas.index')">
                            {{ __('Temas') }}
                        </x-nav-link>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('dispositivos.index')" :active="request()->routeIs('dispositivos.index')">
                            {{ __('Dispositivos') }}
                        </x-nav-link>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('usuarios.index')" :active="request()->routeIs('usuarios.index')">
                            {{ __('Usuarios') }}
                        </x-nav-link>
                    </div>
                @endif
                @if (Auth::user()->is_publisher)
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('publicaciones.index')" :active="request()->routeIs('publicaciones.index')">
                            {{ __('Publicaciones') }}
                        </x-nav-link>
                    </div>
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->getFullName() }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Panel') }}
            </x-responsive-nav-link>

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('temas.index')" :active="request()->routeIs('temas.index')">
                    {{ __('Temas') }}
                </x-responsive-nav-link>
            </div>

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dispositivos.index')" :active="request()->routeIs('dispositivos.index')">
                    {{ __('Dispositivos') }}
                </x-responsive-nav-link>
            </div>

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('publicaciones.index')" :active="request()->routeIs('publicaciones.index')">
                    {{ __('Publicaciones') }}
                </x-responsive-nav-link>
            </div>

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->getFullName() }}
                </div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
