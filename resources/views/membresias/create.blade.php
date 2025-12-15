<x-app-layout title="Crear Membresía - Mama2s Gym">
    <div class="py-12 bg-[#0B0B0B] min-h-screen fade-in">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8 slide-up">
                <h1 class="text-4xl font-bold text-white mb-2">Crear Nueva Membresía</h1>
                <p class="text-[#B0B0B0] text-lg">Completa el formulario para crear un nuevo plan de membresía</p>
            </div>

            <div class="card slide-up" style="animation-delay: 0.1s">
                <form action="{{ route('membresias.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nombre -->
                        <div class="md:col-span-2">
                            <label for="nombre" class="block text-sm font-semibold text-white mb-2">
                                Nombre de la Membresía <span class="text-[#EF4444]">*</span>
                            </label>
                            <input type="text" 
                                   name="nombre" 
                                   id="nombre" 
                                   value="{{ old('nombre') }}"
                                   class="input-field @error('nombre') border-[#EF4444] @enderror"
                                   required>
                            @error('nombre')
                                <p class="mt-1 text-sm text-[#EF4444]">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Descripción -->
                        <div class="md:col-span-2">
                            <label for="descripcion" class="block text-sm font-semibold text-white mb-2">
                                Descripción
                            </label>
                            <textarea name="descripcion" 
                                      id="descripcion" 
                                      rows="3"
                                      class="input-field @error('descripcion') border-[#EF4444] @enderror">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <p class="mt-1 text-sm text-[#EF4444]">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Precio -->
                        <div>
                            <label for="precio" class="block text-sm font-semibold text-white mb-2">
                                Precio (USD) <span class="text-[#EF4444]">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-3.5 text-[#888888] z-10">$</span>
                                <input type="number" 
                                       name="precio" 
                                       id="precio" 
                                       step="0.01"
                                       min="0"
                                       value="{{ old('precio') }}"
                                       class="input-field pl-8 @error('precio') border-[#EF4444] @enderror"
                                       required>
                            </div>
                            @error('precio')
                                <p class="mt-1 text-sm text-[#EF4444]">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Duración en días -->
                        <div>
                            <label for="duracion_dias" class="block text-sm font-semibold text-white mb-2">
                                Duración (días) <span class="text-[#EF4444]">*</span>
                            </label>
                            <input type="number" 
                                   name="duracion_dias" 
                                   id="duracion_dias" 
                                   min="1"
                                   value="{{ old('duracion_dias', 30) }}"
                                   class="input-field @error('duracion_dias') border-[#EF4444] @enderror"
                                   required>
                            @error('duracion_dias')
                                <p class="mt-1 text-sm text-[#EF4444]">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Sesiones con entrenador -->
                        <div>
                            <label for="sesiones_entrenador" class="block text-sm font-semibold text-white mb-2">
                                Sesiones con Entrenador <span class="text-[#EF4444]">*</span>
                            </label>
                            <input type="number" 
                                   name="sesiones_entrenador" 
                                   id="sesiones_entrenador" 
                                   min="0"
                                   value="{{ old('sesiones_entrenador', 0) }}"
                                   class="input-field @error('sesiones_entrenador') border-[#EF4444] @enderror"
                                   required>
                            @error('sesiones_entrenador')
                                <p class="mt-1 text-sm text-[#EF4444]">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Orden -->
                        <div>
                            <label for="orden" class="block text-sm font-semibold text-white mb-2">
                                Orden de Visualización
                            </label>
                            <input type="number" 
                                   name="orden" 
                                   id="orden" 
                                   min="0"
                                   value="{{ old('orden', 0) }}"
                                   class="input-field @error('orden') border-[#EF4444] @enderror">
                            <p class="mt-1 text-xs text-[#888888]">Menor número = aparece primero</p>
                            @error('orden')
                                <p class="mt-1 text-sm text-[#EF4444]">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Características -->
                        <div class="md:col-span-2">
                            <label for="caracteristicas" class="block text-sm font-semibold text-white mb-2">
                                Características (una por línea)
                            </label>
                            <textarea name="caracteristicas" 
                                      id="caracteristicas" 
                                      rows="4"
                                      placeholder="Ejemplo:&#10;Acceso a todas las áreas&#10;Sin límite de visitas&#10;App móvil incluida"
                                      class="input-field @error('caracteristicas') border-[#EF4444] @enderror">{{ old('caracteristicas') }}</textarea>
                            <p class="mt-1 text-xs text-[#888888]">Escribe cada característica en una línea separada</p>
                            @error('caracteristicas')
                                <p class="mt-1 text-sm text-[#EF4444]">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Opciones adicionales -->
                    <div class="mt-8 pt-6 border-t border-[#2A2A2A]">
                        <h3 class="text-lg font-bold text-white mb-4">Opciones Adicionales</h3>
                        
                        <div class="space-y-4">
                            <label class="flex items-center cursor-pointer group">
                                <input type="checkbox" 
                                       name="acceso_clases_grupales" 
                                       value="1"
                                       {{ old('acceso_clases_grupales') ? 'checked' : '' }}
                                       class="w-5 h-5 rounded border-[#2A2A2A] bg-[#1E1E1E] text-[#FFC107] focus:ring-[#FFC107] focus:ring-2 focus:ring-offset-0">
                                <span class="ml-3 text-sm text-[#B0B0B0] group-hover:text-white transition-colors">Acceso a clases grupales</span>
                            </label>

                            <label class="flex items-center cursor-pointer group">
                                <input type="checkbox" 
                                       name="acceso_zona_vip" 
                                       value="1"
                                       {{ old('acceso_zona_vip') ? 'checked' : '' }}
                                       class="w-5 h-5 rounded border-[#2A2A2A] bg-[#1E1E1E] text-[#FFC107] focus:ring-[#FFC107] focus:ring-2 focus:ring-offset-0">
                                <span class="ml-3 text-sm text-[#B0B0B0] group-hover:text-white transition-colors">Acceso a zona VIP</span>
                            </label>

                            <label class="flex items-center cursor-pointer group">
                                <input type="checkbox" 
                                       name="plan_nutricional" 
                                       value="1"
                                       {{ old('plan_nutricional') ? 'checked' : '' }}
                                       class="w-5 h-5 rounded border-[#2A2A2A] bg-[#1E1E1E] text-[#FFC107] focus:ring-[#FFC107] focus:ring-2 focus:ring-offset-0">
                                <span class="ml-3 text-sm text-[#B0B0B0] group-hover:text-white transition-colors">Plan nutricional incluido</span>
                            </label>

                            <label class="flex items-center cursor-pointer group">
                                <input type="checkbox" 
                                       name="activo" 
                                       value="1"
                                       {{ old('activo', true) ? 'checked' : '' }}
                                       class="w-5 h-5 rounded border-[#2A2A2A] bg-[#1E1E1E] text-[#FFC107] focus:ring-[#FFC107] focus:ring-2 focus:ring-offset-0">
                                <span class="ml-3 text-sm text-[#B0B0B0] group-hover:text-white transition-colors">Membresía activa</span>
                            </label>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="mt-8 pt-6 border-t border-[#2A2A2A] flex flex-col sm:flex-row justify-end gap-4">
                        <a href="{{ route('membresias.index') }}" class="btn-secondary text-center">
                            Cancelar
                        </a>
                        <button type="submit" class="btn-primary">
                            Crear Membresía
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
