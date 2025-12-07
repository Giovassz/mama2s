<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromocionRequest;
use App\Http\Requests\UpdatePromocionRequest;
use App\Models\Promocion;
use App\Models\Membresia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     * Para admin y recepcionista: muestra todas las promociones con opciones de gestión
     */
    public function index(): View
    {
        $promociones = Promocion::with('membresia')
            ->orderBy('fecha_inicio', 'desc')
            ->get();
        
        return view('promociones.index', compact('promociones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $membresias = Membresia::activas()->orderBy('nombre')->get();
        return view('promociones.create', compact('membresias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePromocionRequest $request): RedirectResponse
    {
        $data = $request->validated();
        
        // Establecer valores por defecto
        $data['activo'] = $request->has('activo') ? true : false;
        
        // Limpiar campos según el tipo de descuento
        if ($data['tipo_descuento'] === 'porcentaje') {
            $data['monto_descuento'] = null;
        } else {
            $data['descuento_porcentaje'] = null;
        }

        Promocion::create($data);

        return redirect()->route('promociones.index')
            ->with('success', 'Promoción creada exitosamente.');
    }

    /**
     * Display the specified resource.
     * Vista pública de promociones activas y vigentes
     */
    public function showPublic(): View
    {
        try {
            $promociones = Promocion::with('membresia')
                ->vigentes()
                ->orderBy('fecha_inicio', 'desc')
                ->get();
        } catch (\Exception $e) {
            // Si hay error, mostrar array vacío
            $promociones = collect([]);
        }
        
        return view('promociones.public', compact('promociones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promocion $promocione): View
    {
        $membresias = Membresia::activas()->orderBy('nombre')->get();
        return view('promociones.edit', [
            'promocion' => $promocione,
            'membresias' => $membresias,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromocionRequest $request, Promocion $promocione): RedirectResponse
    {
        $data = $request->validated();
        
        // Establecer valores por defecto
        $data['activo'] = $request->has('activo') ? true : false;
        
        // Limpiar campos según el tipo de descuento
        if ($data['tipo_descuento'] === 'porcentaje') {
            $data['monto_descuento'] = null;
        } else {
            $data['descuento_porcentaje'] = null;
        }

        $promocione->update($data);

        return redirect()->route('promociones.index')
            ->with('success', 'Promoción actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promocion $promocione): RedirectResponse
    {
        $promocione->update(['activo' => false]);

        return redirect()->route('promociones.index')
            ->with('success', 'Promoción desactivada exitosamente.');
    }

    /**
     * Activate the specified resource.
     */
    public function activate(Promocion $promocione): RedirectResponse
    {
        $promocione->update(['activo' => true]);

        return redirect()->route('promociones.index')
            ->with('success', 'Promoción activada exitosamente.');
    }
}
