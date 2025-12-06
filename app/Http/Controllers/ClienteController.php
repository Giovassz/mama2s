<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use App\Models\Membresia;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $clientes = Cliente::with(['user', 'membresia'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // Obtener usuarios que no tienen perfil de cliente y tienen rol cliente
        $usuariosDisponibles = User::whereHas('role', function($query) {
            $query->where('slug', 'cliente');
        })->whereDoesntHave('cliente')->get();

        $membresias = Membresia::activas()->ordenadas()->get();
        
        return view('clientes.create', compact('usuariosDisponibles', 'membresias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClienteRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['activo'] = $request->has('activo') ? true : false;

        Cliente::create($data);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente): View
    {
        $membresias = Membresia::activas()->ordenadas()->get();
        
        return view('clientes.edit', compact('cliente', 'membresias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente): RedirectResponse
    {
        $data = $request->validated();
        $data['activo'] = $request->has('activo') ? true : false;

        $cliente->update($data);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     * En lugar de eliminar físicamente, desactivamos el cliente
     */
    public function destroy(Cliente $cliente): RedirectResponse
    {
        $cliente->update(['activo' => false]);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente desactivado exitosamente.');
    }

    /**
     * Activar un cliente desactivado
     */
    public function activate(Cliente $cliente): RedirectResponse
    {
        $cliente->update(['activo' => true]);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente activado exitosamente.');
    }

    /**
     * Mostrar el perfil del cliente autenticado
     */
    public function miPerfil(): View
    {
        $user = auth()->user();
        $cliente = $user->cliente;

        if (!$cliente) {
            abort(404, 'Perfil de cliente no encontrado');
        }

        // Cargar relaciones
        $cliente->load('membresia', 'user');

        return view('clientes.mi-perfil', compact('cliente'));
    }
}
