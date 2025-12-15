<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-white mb-2">Iniciar Sesión</h2>
        <p class="text-[#B0B0B0]">Accede a tu cuenta de Mama2s Gym</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-2 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-[#2A2A2A] bg-[#1E1E1E] text-[#FFC107] focus:ring-[#FFC107] focus:ring-offset-[#0B0B0B] focus:ring-2" name="remember">
                <span class="ms-2 text-sm text-[#B0B0B0]">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-[#FFC107] hover:text-[#FFB703] transition-colors" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="pt-4">
            <x-primary-button class="w-full justify-center">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <div class="text-center pt-4 border-t border-[#2A2A2A]">
            <p class="text-sm text-[#B0B0B0]">
                ¿No tienes cuenta?
                <a href="{{ route('register') }}" class="text-[#FFC107] hover:text-[#FFB703] font-semibold transition-colors">
                    Regístrate aquí
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
