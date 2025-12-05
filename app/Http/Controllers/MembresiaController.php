<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMembresiaRequest;
use App\Http\Requests\UpdateMembresiaRequest;
use App\Models\Membresia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MembresiaController extends Controller
{
    /**
     * Display a listing of the resource.
     * Para admin y recepcionista: muestra todas las membresías con opciones de gestión
     */
    public function index(): View
    {
        $membresias = Membresia::ordenadas()->get();
        
        return view('membresias.index', compact('membresias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('membresias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMembresiaRequest $request): RedirectResponse
    {
        $data = $request->validated();
        
        // Convertir características a array si viene como string
        if (isset($data['caracteristicas']) && is_string($data['caracteristicas'])) {
            $data['caracteristicas'] = array_filter(
                array_map('trim', explode("\n", $data['caracteristicas']))
            );
        }

        // Establecer valores por defecto para campos booleanos
        $data['activo'] = $request->has('activo') ? true : false;
        $data['acceso_clases_grupales'] = $request->has('acceso_clases_grupales') ? true : false;
        $data['acceso_zona_vip'] = $request->has('acceso_zona_vip') ? true : false;
        $data['plan_nutricional'] = $request->has('plan_nutricional') ? true : false;

        Membresia::create($data);

        return redirect()->route('membresias.index')
            ->with('success', 'Membresía creada exitosamente.');
    }

    /**
     * Display the specified resource.
     * Para clientes: muestra la página pública de membresías
     */
    public function showPublic(): View
    {
        $membresias = Membresia::activas()->ordenadas()->get();
        
        return view('membresias.public', compact('membresias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Membresia $membresia): View
    {
        return view('membresias.edit', compact('membresia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMembresiaRequest $request, Membresia $membresia): RedirectResponse
    {
        $data = $request->validated();
        
        // Convertir características a array si viene como string
        if (isset($data['caracteristicas']) && is_string($data['caracteristicas'])) {
            $data['caracteristicas'] = array_filter(
                array_map('trim', explode("\n", $data['caracteristicas']))
            );
        }

        // Establecer valores para campos booleanos
        $data['activo'] = $request->has('activo') ? true : false;
        $data['acceso_clases_grupales'] = $request->has('acceso_clases_grupales') ? true : false;
        $data['acceso_zona_vip'] = $request->has('acceso_zona_vip') ? true : false;
        $data['plan_nutricional'] = $request->has('plan_nutricional') ? true : false;

        $membresia->update($data);

        return redirect()->route('membresias.index')
            ->with('success', 'Membresía actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     * En lugar de eliminar físicamente, desactivamos la membresía
     */
    public function destroy(Membresia $membresia): RedirectResponse
    {
        $membresia->update(['activo' => false]);

        return redirect()->route('membresias.index')
            ->with('success', 'Membresía desactivada exitosamente.');
    }

    /**
     * Activar una membresía desactivada
     */
    public function activate(Membresia $membresia): RedirectResponse
    {
        $membresia->update(['activo' => true]);

        return redirect()->route('membresias.index')
            ->with('success', 'Membresía activada exitosamente.');
    }
}
