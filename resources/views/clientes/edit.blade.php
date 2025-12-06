<x-app-layout title="Editar Cliente - Mama2s Gym">
    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Editar Cliente</h1>
                <p class="text-gray-600 mt-2">Modifica la información del cliente</p>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('clientes.update', $cliente) }}" method="POST" class="p-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Usuario (solo lectura) -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Usuario
                            </label>
                            <input type="text" 
                                   value="{{ $cliente->user ? $cliente->user->name . ' (' . $cliente->user->email . ')' : 'N/A' }}"
                                   disabled
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100 text-gray-600">
                            <p class="mt-1 text-sm text-gray-500">El usuario no puede ser modificado</p>
                        </div>

                        <!-- Nombre -->
                        <div>
                            <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">
                                Nombre <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="nombre" 
                                   id="nombre" 
                                   value="{{ old('nombre', $cliente->nombre) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500 @error('nombre') border-red-500 @enderror"
                                   required>
                            @error('nombre')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Apellido -->
                        <div>
                            <label for="apellido" class="block text-sm font-medium text-gray-700 mb-2">
                                Apellido <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="apellido" 
                                   id="apellido" 
                                   value="{{ old('apellido', $cliente->apellido) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500 @error('apellido') border-red-500 @enderror"
                                   required>
                            @error('apellido')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" 
                                   name="email" 
                                   id="email" 
                                   value="{{ old('email', $cliente->email) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500 @error('email') border-red-500 @enderror"
                                   required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Teléfono -->
                        <div>
                            <label for="telefono" class="block text-sm font-medium text-gray-700 mb-2">
                                Teléfono
                            </label>
                            <input type="text" 
                                   name="telefono" 
                                   id="telefono" 
                                   value="{{ old('telefono', $cliente->telefono) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500 @error('telefono') border-red-500 @enderror">
                            @error('telefono')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fecha de Registro -->
                        <div>
                            <label for="fecha_registro" class="block text-sm font-medium text-gray-700 mb-2">
                                Fecha de Registro <span class="text-red-500">*</span>
                            </label>
                            <input type="date" 
                                   name="fecha_registro" 
                                   id="fecha_registro" 
                                   value="{{ old('fecha_registro', $cliente->fecha_registro->format('Y-m-d')) }}"
                                   max="{{ date('Y-m-d') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500 @error('fecha_registro') border-red-500 @enderror"
                                   required>
                            @error('fecha_registro')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fecha de Nacimiento -->
                        <div>
                            <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700 mb-2">
                                Fecha de Nacimiento
                            </label>
                            <input type="date" 
                                   name="fecha_nacimiento" 
                                   id="fecha_nacimiento" 
                                   value="{{ old('fecha_nacimiento', $cliente->fecha_nacimiento ? $cliente->fecha_nacimiento->format('Y-m-d') : '') }}"
                                   max="{{ date('Y-m-d', strtotime('-1 day')) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500 @error('fecha_nacimiento') border-red-500 @enderror">
                            @error('fecha_nacimiento')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Género -->
                        <div>
                            <label for="genero" class="block text-sm font-medium text-gray-700 mb-2">
                                Género
                            </label>
                            <select name="genero" 
                                    id="genero" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500 @error('genero') border-red-500 @enderror">
                                <option value="">Seleccione</option>
                                <option value="M" {{ old('genero', $cliente->genero) == 'M' ? 'selected' : '' }}>Masculino</option>
                                <option value="F" {{ old('genero', $cliente->genero) == 'F' ? 'selected' : '' }}>Femenino</option>
                                <option value="Otro" {{ old('genero', $cliente->genero) == 'Otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('genero')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Membresía -->
                        <div>
                            <label for="membresia_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Membresía
                            </label>
                            <select name="membresia_id" 
                                    id="membresia_id" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500 @error('membresia_id') border-red-500 @enderror">
                                <option value="">Sin membresía</option>
                                @foreach($membresias as $membresia)
                                    <option value="{{ $membresia->id }}" {{ old('membresia_id', $cliente->membresia_id) == $membresia->id ? 'selected' : '' }}>
                                        {{ $membresia->nombre }} - ${{ number_format($membresia->precio, 2) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('membresia_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Dirección -->
                        <div class="md:col-span-2">
                            <label for="direccion" class="block text-sm font-medium text-gray-700 mb-2">
                                Dirección
                            </label>
                            <textarea name="direccion" 
                                      id="direccion" 
                                      rows="2"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500 @error('direccion') border-red-500 @enderror">{{ old('direccion', $cliente->direccion) }}</textarea>
                            @error('direccion')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Estado -->
                    <div class="mt-6">
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="activo" 
                                   value="1"
                                   {{ old('activo', $cliente->activo) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                            <span class="ml-2 text-sm text-gray-700">Cliente activo</span>
                        </label>
                    </div>

                    <!-- Botones -->
                    <div class="mt-8 flex justify-end space-x-4">
                        <a href="{{ route('clientes.index') }}" class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors">
                            Cancelar
                        </a>
                        <button type="submit" class="px-6 py-2 bg-orange-500 hover:bg-orange-600 text-gray-900 rounded-md font-semibold transition-colors">
                            Actualizar Cliente
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

