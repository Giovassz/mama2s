<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-white leading-tight">
                {{ __('Profile') }}
            </h2>
            @if(Auth::user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="btn-primary inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    Panel de Administración
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12 bg-[#0B0B0B]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if(Auth::user()->isAdmin())
                <div class="card border-2 border-[#FFC107]/30 bg-gradient-to-r from-[#FFC107]/10 to-[#FFB703]/10 slide-up">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                        <div>
                            <h3 class="text-xl font-bold text-white mb-2">Acceso de Administrador</h3>
                            <p class="text-[#B0B0B0]">Gestiona usuarios, clientes, membresías y promociones desde el panel de administración.</p>
                        </div>
                        <a href="{{ route('admin.dashboard') }}" class="btn-primary whitespace-nowrap">
                            Ir al Panel
                        </a>
                    </div>
                </div>
            @endif
            <div class="card slide-up" style="animation-delay: 0.1s">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card slide-up" style="animation-delay: 0.2s">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="card slide-up" style="animation-delay: 0.3s">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
