<x-app-layout title="Mama2s Gym - Tu mejor versión empieza hoy">

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                    Mama2s Gym
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-gray-300">
                    Tu mejor versión empieza hoy
                </p>
                <p class="text-lg mb-10 text-gray-400 max-w-2xl mx-auto">
                    Transforma tu cuerpo, fortalece tu mente. Únete a la comunidad fitness más grande y alcanza tus objetivos con nosotros.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('membresias') }}" class="bg-orange-500 hover:bg-orange-600 text-gray-900 px-8 py-4 rounded-md font-semibold text-lg transition-all transform hover:scale-105 shadow-lg">
                        Ver Planes
                    </a>
                    <a href="{{ route('register') }}" class="bg-transparent border-2 border-white hover:bg-white hover:text-gray-900 text-white px-8 py-4 rounded-md font-semibold text-lg transition-all">
                        Únete Ahora
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" 
                 alt="Gimnasio" 
                 class="w-full h-full object-cover opacity-30">
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    ¿Por qué elegir Mama2s?
                </h2>
                <p class="text-gray-600 text-lg">
                    Equipamiento de última generación y entrenadores profesionales
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="text-center p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <div class="bg-orange-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Equipamiento Moderno</h3>
                    <p class="text-gray-600">
                        Tecnología de punta y máquinas de última generación para tu entrenamiento.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="text-center p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <div class="bg-orange-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Entrenadores Certificados</h3>
                    <p class="text-gray-600">
                        Profesionales capacitados para guiarte en cada paso de tu transformación.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="text-center p-6 rounded-lg hover:shadow-lg transition-shadow">
                    <div class="bg-orange-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Horarios Flexibles</h3>
                    <p class="text-gray-600">
                        Entrena cuando quieras, desde las 6 AM hasta las 11 PM todos los días.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gray-900 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                ¿Listo para comenzar tu transformación?
            </h2>
            <p class="text-xl text-gray-300 mb-8">
                Únete a miles de personas que ya están alcanzando sus objetivos
            </p>
            <a href="{{ route('register') }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-gray-900 px-8 py-4 rounded-md font-semibold text-lg transition-all transform hover:scale-105 shadow-lg">
                Comienza Ahora
            </a>
        </div>
    </section>
</x-app-layout>

