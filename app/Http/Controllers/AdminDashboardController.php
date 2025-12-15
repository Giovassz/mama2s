<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Membresia;
use App\Models\Promocion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    /**
     * Muestra el panel de administración con estadísticas
     */
    public function index(): View
    {
        // Estadísticas de usuarios
        $totalUsuarios = User::count();
        $usuariosAdmin = User::whereHas('role', function($query) {
            $query->where('slug', 'admin');
        })->count();
        $usuariosRecepcionista = User::whereHas('role', function($query) {
            $query->where('slug', 'recepcionista');
        })->count();
        $usuariosCliente = User::whereHas('role', function($query) {
            $query->where('slug', 'cliente');
        })->count();

        // Estadísticas de clientes
        $totalClientes = Cliente::count();
        $clientesActivos = Cliente::where('activo', true)->count();
        $clientesInactivos = Cliente::where('activo', false)->count();
        $nuevosClientesEsteMes = Cliente::whereMonth('fecha_registro', now()->month)
            ->whereYear('fecha_registro', now()->year)
            ->count();

        // Estadísticas de membresías
        $totalMembresias = Membresia::count();
        $membresiasActivas = Membresia::where('activo', true)->count();
        $membresiasInactivas = Membresia::where('activo', false)->count();
        
        // Clientes por membresía
        $distribucionMembresias = Membresia::withCount(['clientes' => function($query) {
            $query->where('activo', true);
        }])->get();

        // Estadísticas de promociones
        $totalPromociones = Promocion::count();
        $promocionesActivas = Promocion::where('activo', true)->count();
        $promocionesVigentes = Promocion::vigentes()->count();

        // Ingresos estimados (precio de membresías activas de clientes activos)
        $ingresosMensuales = Cliente::where('activo', true)
            ->with('membresia')
            ->get()
            ->sum(function($cliente) {
                return $cliente->membresia ? $cliente->membresia->precio : 0;
            });

        // Estadísticas de crecimiento
        $clientesMesAnterior = Cliente::whereMonth('fecha_registro', now()->subMonth()->month)
            ->whereYear('fecha_registro', now()->subMonth()->year)
            ->count();
        
        $crecimientoClientes = $clientesMesAnterior > 0 
            ? round((($nuevosClientesEsteMes - $clientesMesAnterior) / $clientesMesAnterior) * 100, 1)
            : 0;

        // Clientes recientes
        $clientesRecientes = Cliente::with(['user', 'membresia'])
            ->orderBy('fecha_registro', 'desc')
            ->limit(5)
            ->get();

        // Membresías más populares
        $membresiasPopulares = Membresia::withCount(['clientes' => function($query) {
            $query->where('activo', true);
        }])
        ->orderBy('clientes_count', 'desc')
        ->limit(3)
        ->get();

        return view('admin.dashboard', compact(
            'totalUsuarios',
            'usuariosAdmin',
            'usuariosRecepcionista',
            'usuariosCliente',
            'totalClientes',
            'clientesActivos',
            'clientesInactivos',
            'nuevosClientesEsteMes',
            'totalMembresias',
            'membresiasActivas',
            'membresiasInactivas',
            'totalPromociones',
            'promocionesActivas',
            'promocionesVigentes',
            'ingresosMensuales',
            'crecimientoClientes',
            'clientesRecientes',
            'membresiasPopulares',
            'distribucionMembresias'
        ));
    }
}
