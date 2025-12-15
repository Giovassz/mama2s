<x-app-layout title="Crear Promoción - Mama2s Gym">
    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Crear Nueva Promoción</h1>
                <p class="text-gray-600 mt-2">Completa el formulario para crear una nueva promoción</p>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('promociones.store') }}" method="POST" class="p-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Título -->
                        <div class="md:col-span-2">
                            <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">
                                Título de la Promoción <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="titulo" 
                                   id="titulo" 
                                   value="{{ old('titulo') }}"
                                   class="w-full px-4 py-2 bg-white border border-gray-300 rounded-md text-black focus:ring-orange-500 focus:border-orange-500 @error('titulo') border-red-500 @enderror"
                                   required>
                            @error('titulo')
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
                                      class="w-full px-4 py-2 bg-white border border-gray-300 rounded-md text-black focus:ring-orange-500 focus:border-orange-500 @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tipo de Descuento -->
                        <div class="md:col-span-2">
                            <label for="tipo_descuento" class="block text-sm font-medium text-gray-700 mb-2">
                                Tipo de Descuento <span class="text-red-500">*</span>
                            </label>
                            <select name="tipo_descuento" 
                                    id="tipo_descuento" 
                                    class="w-full px-4 py-2 bg-white border border-gray-300 rounded-md text-black focus:ring-orange-500 focus:border-orange-500 @error('tipo_descuento') border-red-500 @enderror"
                                    required
                                    onchange="toggleDescuentoFields()">
                                <option value="porcentaje" {{ old('tipo_descuento', 'porcentaje') === 'porcentaje' ? 'selected' : '' }}>Porcentaje (%)</option>
                                <option value="monto" {{ old('tipo_descuento') === 'monto' ? 'selected' : '' }}>Monto Fijo ($)</option>
                            </select>
                            @error('tipo_descuento')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Descuento Porcentaje -->
                        <div id="descuento_porcentaje_field">
                            <label for="descuento_porcentaje" class="block text-sm font-medium text-gray-700 mb-2">
                                Porcentaje de Descuento (%) <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="number" 
                                       name="descuento_porcentaje" 
                                       id="descuento_porcentaje" 
                                       step="0.01"
                                       min="0"
                                       max="100"
                                       value="{{ old('descuento_porcentaje') }}"
                                       class="w-full px-4 py-2 bg-white border border-gray-300 rounded-md text-black focus:ring-orange-500 focus:border-orange-500 @error('descuento_porcentaje') border-red-500 @enderror">
                                <span class="absolute right-3 top-2 text-gray-500">%</span>
                            </div>
                            @error('descuento_porcentaje')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Monto Descuento -->
                        <div id="monto_descuento_field" style="display: none;">
                            <label for="monto_descuento" class="block text-sm font-medium text-gray-700 mb-2">
                                Monto de Descuento ($) <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-2 text-gray-500">$</span>
                                <input type="number" 
                                       name="monto_descuento" 
                                       id="monto_descuento" 
                                       step="0.01"
                                       min="0"
                                       value="{{ old('monto_descuento') }}"
                                       class="w-full pl-8 pr-4 py-2 bg-white border border-gray-300 rounded-md text-black focus:ring-orange-500 focus:border-orange-500 @error('monto_descuento') border-red-500 @enderror">
                            </div>
                            @error('monto_descuento')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fecha Inicio -->
                        <div>
                            <label for="fecha_inicio" class="block text-sm font-medium text-gray-700 mb-2">
                                Fecha de Inicio <span class="text-red-500">*</span>
                            </label>
                            <input type="date" 
                                   name="fecha_inicio" 
                                   id="fecha_inicio" 
                                   value="{{ old('fecha_inicio') }}"
                                   class="w-full px-4 py-2 bg-white border border-gray-300 rounded-md text-black focus:ring-orange-500 focus:border-orange-500 @error('fecha_inicio') border-red-500 @enderror"
                                   required>
                            @error('fecha_inicio')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fecha Fin -->
                        <div>
                            <label for="fecha_fin" class="block text-sm font-medium text-gray-700 mb-2">
                                Fecha de Fin <span class="text-red-500">*</span>
                            </label>
                            <input type="date" 
                                   name="fecha_fin" 
                                   id="fecha_fin" 
                                   value="{{ old('fecha_fin') }}"
                                   class="w-full px-4 py-2 bg-white border border-gray-300 rounded-md text-black focus:ring-orange-500 focus:border-orange-500 @error('fecha_fin') border-red-500 @enderror"
                                   required>
                            @error('fecha_fin')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Membresía -->
                        <div class="md:col-span-2">
                            <label for="membresia_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Membresía Asociada
                            </label>
                            <select name="membresia_id" 
                                    id="membresia_id" 
                                    class="w-full px-4 py-2 bg-white border border-gray-300 rounded-md text-black focus:ring-orange-500 focus:border-orange-500 @error('membresia_id') border-red-500 @enderror">
                                <option value="">Todas las membresías (promoción general)</option>
                                @foreach($membresias as $membresia)
                                    <option value="{{ $membresia->id }}" {{ old('membresia_id') == $membresia->id ? 'selected' : '' }}>
                                        {{ $membresia->nombre }} - ${{ number_format($membresia->precio, 2) }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="mt-1 text-xs text-gray-500">Deja en blanco para aplicar a todas las membresías</p>
                            @error('membresia_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Opciones adicionales -->
                    <div class="mt-6">
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="activo" 
                                   value="1"
                                   {{ old('activo', true) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                            <span class="ml-2 text-sm text-gray-700">Promoción activa</span>
                        </label>
                    </div>

                    <!-- Botones -->
                    <div class="mt-8 flex justify-end space-x-4">
                        <a href="{{ route('promociones.index') }}" class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors">
                            Cancelar
                        </a>
                        <button type="submit" class="px-6 py-2 bg-orange-500 hover:bg-orange-600 text-gray-900 rounded-md font-semibold transition-colors">
                            Crear Promoción
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleDescuentoFields() {
            const tipoDescuento = document.getElementById('tipo_descuento').value;
            const porcentajeField = document.getElementById('descuento_porcentaje_field');
            const montoField = document.getElementById('monto_descuento_field');
            const porcentajeInput = document.getElementById('descuento_porcentaje');
            const montoInput = document.getElementById('monto_descuento');

            if (tipoDescuento === 'porcentaje') {
                porcentajeField.style.display = 'block';
                montoField.style.display = 'none';
                porcentajeInput.required = true;
                montoInput.required = false;
                montoInput.value = '';
            } else {
                porcentajeField.style.display = 'none';
                montoField.style.display = 'block';
                porcentajeInput.required = false;
                montoInput.required = true;
                porcentajeInput.value = '';
            }
        }

        // Inicializar campos al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            toggleDescuentoFields();
        });
    </script>
</x-app-layout>

