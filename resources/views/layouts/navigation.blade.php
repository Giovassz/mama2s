<nav x-data="{ open: false }" class="bg-gray-900 text-white shadow-lg sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center flex-1">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 hover:opacity-90 transition-opacity">
                        <img src="{{ asset('images/logo.png') }}" alt="Mama2s Gym" class="h-8 w-auto">
                        <span class="text-xl font-bold">Mama2s</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:ml-8 space-x-1">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="px-4 py-2 rounded-md transition-colors hover:bg-gray-800 {{ request()->routeIs('home') ? 'bg-gray-800' : '' }}">
                        Inicio
                    </x-nav-link>
                    <x-nav-link href="{{ route('membresias') }}" :active="request()->routeIs('membresias')" class="px-4 py-2 rounded-md transition-colors hover:bg-gray-800 {{ request()->routeIs('membresias') ? 'bg-gray-800' : '' }}">
                        Membresías
                    </x-nav-link>
                    <x-nav-link href="{{ route('promociones') }}" :active="request()->routeIs('promociones')" class="px-4 py-2 rounded-md transition-colors hover:bg-gray-800 {{ request()->routeIs('promociones') ? 'bg-gray-800' : '' }}">
                        Promociones
                    </x-nav-link>
                    @auth
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="px-4 py-2 rounded-md transition-colors hover:bg-gray-800 {{ request()->routeIs('dashboard') ? 'bg-gray-800' : '' }}">
                            Mi Cuenta
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-800 hover:bg-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <span class="mr-2">{{ Auth::user()->name }}</span>
                                @if(Auth::user()->role)
                                    <span class="mr-2 text-xs bg-orange-500 text-gray-900 px-2 py-1 rounded font-semibold">
                                        {{ ucfirst(Auth::user()->role->name) }}
                                    </span>
                                @endif
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            @if(Auth::user()->isAdmin())
                                <x-dropdown-link :href="route('admin.dashboard')" class="bg-gradient-to-r from-orange-500 to-orange-600 text-white hover:from-orange-600 hover:to-orange-700 font-semibold">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    {{ __('Panel de Administración') }}
                                </x-dropdown-link>
                            @endif

                            @if(Auth::user()->isCliente())
                                <x-dropdown-link :href="route('clientes.mi-perfil')">
                                    {{ __('Mi Perfil de Cliente') }}
                                </x-dropdown-link>
                            @endif

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
                @else
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-white hover:text-orange-500 transition-colors">
                            Iniciar Sesión
                        </a>
                        <a href="{{ route('register') }}" class="bg-orange-500 hover:bg-orange-600 text-gray-900 px-4 py-2 rounded-md font-medium transition-colors">
                            Registrarse
                        </a>
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-800 focus:outline-none focus:bg-gray-800 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gray-800 border-t border-gray-700">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" class="px-4 py-2">
                Inicio
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('membresias') }}" :active="request()->routeIs('membresias')" class="px-4 py-2">
                Membresías
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('promociones') }}" :active="request()->routeIs('promociones')" class="px-4 py-2">
                Promociones
            </x-responsive-nav-link>
            @auth
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="px-4 py-2">
                    Mi Cuenta
                </x-responsive-nav-link>
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-700">
                <div class="px-4">
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
                    @if(Auth::user()->role)
                        <div class="mt-1">
                            <span class="text-xs bg-orange-500 text-gray-900 px-2 py-1 rounded">
                                {{ Auth::user()->role->name }}
                            </span>
                        </div>
                    @endif
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Perfil') }}
                    </x-responsive-nav-link>

                    @if(Auth::user()->isAdmin())
                        <x-responsive-nav-link :href="route('admin.dashboard')" class="bg-orange-500 text-white font-semibold">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            {{ __('Panel de Administración') }}
                        </x-responsive-nav-link>
                    @endif

                    @if(Auth::user()->isCliente())
                        <x-responsive-nav-link :href="route('clientes.mi-perfil')">
                            {{ __('Mi Perfil de Cliente') }}
                        </x-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Cerrar Sesión') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <div class="pt-4 pb-1 border-t border-gray-700">
                <div class="px-4 space-y-2">
                    <a href="{{ route('login') }}" class="block text-center text-white hover:text-orange-500 transition-colors py-2">
                        Iniciar Sesión
                    </a>
                    <a href="{{ route('register') }}" class="block text-center bg-orange-500 hover:bg-orange-600 text-gray-900 px-4 py-2 rounded-md font-medium transition-colors">
                        Registrarse
                    </a>
                </div>
            </div>
        @endauth
    </div>
</nav>
