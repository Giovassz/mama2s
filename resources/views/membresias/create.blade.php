<x-app-layout title="Crear Membresía - Mama2s Gym">
    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Crear Nueva Membresía</h1>
                <p class="text-gray-600 mt-2">Completa el formulario para crear un nuevo plan de membresía</p>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('membresias.store') }}" method="POST" class="p-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nombre -->
                        <div class="md:col-span-2">
                            <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">
                                Nombre de la Membresía <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="nombre" 
                                   id="nombre" 
                                   value="{{ old('nombre') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500 @error('nombre') border-red-500 @enderror"
                                   required>
                            @error('nombre')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Descripción -->
                        <div class="md:col-span-2">
                            <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">
                                Descripción
                            </label>
                            <textarea name="descripcion" 
                                      id="descripcion" 
                                      rows="3"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500 @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Precio -->
                        <div>
                            <label for="precio" class="block text-sm font-medium text-gray-700 mb-2">
                                Precio (USD) <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-2 text-gray-500">$</span>
                                <input type="number" 
                                       name="precio" 
                                       id="precio" 
                                       step="0.01"
                                       min="0"
                                       value="{{ old('precio') }}"
                                       class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500 @error('precio') border-red-500 @enderror"
                                       required>
                            </div>
                            @error('precio')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Duración en días -->
                        <div>
                            <label for="duracion_dias" class="block text-sm font-medium text-gray-700 mb-2">
                                Duración (días) <span class="text-red-500">*</span>
                            </label>
                            <input type="number" 
                                   name="duracion_dias" 
                                   id="duracion_dias" 
                                   min="1"
                                   value="{{ old('duracion_dias', 30) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500 @error('duracion_dias') border-red-500 @enderror"
                                   required>
                            @error('duracion_dias')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Sesiones con entrenador -->
                        <div>
                            <label for="sesiones_entrenador" class="block text-sm font-medium text-gray-700 mb-2">
                                Sesiones con Entrenador <span class="text-red-500">*</span>
                            </label>
                            <input type="number" 
                                   name="sesiones_entrenador" 
                                   id="sesiones_entrenador" 
                                   min="0"
                                   value="{{ old('sesiones_entrenador', 0) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500 @error('sesiones_entrenador') border-red-500 @enderror"
                                   required>
                            @error('sesiones_entrenador')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Orden -->
                        <div>
                            <label for="orden" class="block text-sm font-medium text-gray-700 mb-2">
                                Orden de Visualización
                            </label>
                            <input type="number" 
                                   name="orden" 
                                   id="orden" 
                                   min="0"
                                   value="{{ old('orden', 0) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500 @error('orden') border-red-500 @enderror">
                            <p class="mt-1 text-xs text-gray-500">Menor número = aparece primero</p>
                            @error('orden')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Características -->
                        <div class="md:col-span-2">
                            <label for="caracteristicas" class="block text-sm font-medium text-gray-700 mb-2">
                                Características (una por línea)
                            </label>
                            <textarea name="caracteristicas" 
                                      id="caracteristicas" 
                                      rows="4"
                                      placeholder="Ejemplo:&#10;Acceso a todas las áreas&#10;Sin límite de visitas&#10;App móvil incluida"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500 @error('caracteristicas') border-red-500 @enderror">{{ old('caracteristicas') }}</textarea>
                            <p class="mt-1 text-xs text-gray-500">Escribe cada característica en una línea separada</p>
                            @error('caracteristicas')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Opciones adicionales -->
                    <div class="mt-6 space-y-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Opciones Adicionales</h3>
                        
                        <div class="space-y-3">
                            <label class="flex items-center">
                                <input type="checkbox" 
                                       name="acceso_clases_grupales" 
                                       value="1"
                                       {{ old('acceso_clases_grupales') ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                                <span class="ml-2 text-sm text-gray-700">Acceso a clases grupales</span>
                            </label>

                            <label class="flex items-center">
                                <input type="checkbox" 
                                       name="acceso_zona_vip" 
                                       value="1"
                                       {{ old('acceso_zona_vip') ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                                <span class="ml-2 text-sm text-gray-700">Acceso a zona VIP</span>
                            </label>

                            <label class="flex items-center">
                                <input type="checkbox" 
                                       name="plan_nutricional" 
                                       value="1"
                                       {{ old('plan_nutricional') ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                                <span class="ml-2 text-sm text-gray-700">Plan nutricional incluido</span>
                            </label>

                            <label class="flex items-center">
                                <input type="checkbox" 
                                       name="activo" 
                                       value="1"
                                       {{ old('activo', true) ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                                <span class="ml-2 text-sm text-gray-700">Membresía activa</span>
                            </label>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="mt-8 flex justify-end space-x-4">
                        <a href="{{ route('membresias.index') }}" class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors">
                            Cancelar
                        </a>
                        <button type="submit" class="px-6 py-2 bg-orange-500 hover:bg-orange-600 text-gray-900 rounded-md font-semibold transition-colors">
                            Crear Membresía
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

