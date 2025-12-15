<nav x-data="{ open: false }" class="bg-[#0B0B0B] border-b border-[#1E1E1E] sticky top-0 z-50 backdrop-blur-sm bg-opacity-95">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">
            <!-- Logo - Centrado y más grande -->
            <div class="flex-1 flex justify-center lg:justify-start">
                <a href="{{ route('home') }}" class="flex items-center space-x-4 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Mama2s Gym" class="h-16 w-auto brightness-0 invert group-hover:brightness-100 group-hover:invert-0 transition-all duration-300">
                    <span class="text-3xl font-bold text-white group-hover:text-[#FFC107] transition-colors duration-300">Mama2s</span>
                </a>
            </div>

            <!-- Settings Dropdown - Solo en desktop -->
            <div class="hidden lg:flex lg:items-center">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-5 py-2.5 rounded-xl text-white bg-[#1E1E1E] hover:bg-[#2A2A2A] border border-[#2A2A2A] hover:border-[#FFC107]/50 focus:outline-none transition-all duration-300 group">
                                <span class="mr-3 font-medium">{{ Auth::user()->name }}</span>
                                @if(Auth::user()->role)
                                    <span class="badge-gold mr-3">
                                        {{ ucfirst(Auth::user()->role->name) }}
                                    </span>
                                @endif
                                <svg class="fill-current h-4 w-4 group-hover:text-[#FFC107] transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('dashboard')">
                                {{ __('Dashboard') }}
                            </x-dropdown-link>

                            @if(Auth::user()->isAdmin())
                                <x-dropdown-link :href="route('admin.dashboard')" class="bg-[#FFC107] text-black hover:bg-[#FFB703] font-semibold">
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
                        <a href="{{ route('login') }}" class="text-white hover:text-[#FFC107] font-medium transition-colors duration-300 px-4 py-2">
                            Iniciar Sesión
                        </a>
                        <a href="{{ route('register') }}" class="btn-primary">
                            Registrarse
                        </a>
                    </div>
                @endauth
            </div>

            <!-- Hamburger - Mobile -->
            <div class="flex items-center lg:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-white hover:bg-[#1E1E1E] hover:text-[#FFC107] focus:outline-none transition-all duration-300">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden bg-[#1E1E1E] border-t border-[#2A2A2A] fade-in">
        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-4 border-t border-[#2A2A2A] px-4">
                <div class="px-4 py-3 bg-[#0B0B0B] rounded-xl mb-4">
                    <div class="font-semibold text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-[#B0B0B0] mt-1">{{ Auth::user()->email }}</div>
                    @if(Auth::user()->role)
                        <div class="mt-2">
                            <span class="badge-gold">
                                {{ Auth::user()->role->name }}
                            </span>
                        </div>
                    @endif
                </div>

                <div class="space-y-2">
                    <x-responsive-nav-link :href="route('dashboard')" class="px-4 py-3 rounded-lg hover:bg-[#2A2A2A] transition-colors">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('profile.edit')" class="px-4 py-3 rounded-lg hover:bg-[#2A2A2A] transition-colors">
                        {{ __('Perfil') }}
                    </x-responsive-nav-link>

                    @if(Auth::user()->isAdmin())
                        <x-responsive-nav-link :href="route('admin.dashboard')" class="px-4 py-3 rounded-lg bg-[#FFC107] text-black font-semibold hover:bg-[#FFB703] transition-colors">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            {{ __('Panel de Administración') }}
                        </x-responsive-nav-link>
                    @endif

                    @if(Auth::user()->isCliente())
                        <x-responsive-nav-link :href="route('clientes.mi-perfil')" class="px-4 py-3 rounded-lg hover:bg-[#2A2A2A] transition-colors">
                            {{ __('Mi Perfil de Cliente') }}
                        </x-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                class="px-4 py-3 rounded-lg hover:bg-[#2A2A2A] transition-colors">
                            {{ __('Cerrar Sesión') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <div class="pt-4 pb-4 border-t border-[#2A2A2A] px-4 space-y-3">
                <a href="{{ route('login') }}" class="block text-center text-white hover:text-[#FFC107] font-medium transition-colors py-3">
                    Iniciar Sesión
                </a>
                <a href="{{ route('register') }}" class="block text-center btn-primary">
                    Registrarse
                </a>
            </div>
        @endauth
    </div>
</nav>
