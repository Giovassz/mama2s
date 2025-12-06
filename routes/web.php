<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MembresiaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Página de inicio (pública)
Route::get('/', function () {
    return view('home');
})->name('home');

// Rutas públicas
Route::get('/membresias', [MembresiaController::class, 'showPublic'])->name('membresias');

Route::get('/promociones', function () {
    return view('promociones');
})->name('promociones');

// Dashboard (requiere autenticación)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas protegidas por rol - Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Rutas protegidas por rol - Recepcionista
Route::middleware(['auth', 'role:recepcionista'])->group(function () {
    Route::get('/recepcionista', function () {
        return view('recepcionista.dashboard');
    })->name('recepcionista.dashboard');
});

// Rutas de Membresías - Solo Admin y Recepcionista pueden gestionar
Route::middleware(['auth', 'role:admin,recepcionista'])->group(function () {
    Route::get('/admin/membresias', [MembresiaController::class, 'index'])->name('membresias.index');
    Route::get('/admin/membresias/create', [MembresiaController::class, 'create'])->name('membresias.create');
    Route::post('/admin/membresias', [MembresiaController::class, 'store'])->name('membresias.store');
    Route::get('/admin/membresias/{membresia}/edit', [MembresiaController::class, 'edit'])->name('membresias.edit');
    Route::put('/admin/membresias/{membresia}', [MembresiaController::class, 'update'])->name('membresias.update');
    Route::delete('/admin/membresias/{membresia}', [MembresiaController::class, 'destroy'])->name('membresias.destroy');
    Route::patch('/admin/membresias/{membresia}/activate', [MembresiaController::class, 'activate'])
        ->name('membresias.activate');

    // Rutas de Clientes - Solo Admin y Recepcionista pueden gestionar
    Route::get('/admin/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/admin/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/admin/clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/admin/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/admin/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/admin/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
    Route::patch('/admin/clientes/{cliente}/activate', [ClienteController::class, 'activate'])
        ->name('clientes.activate');
});

// Rutas protegidas por rol - Cliente
Route::middleware(['auth', 'role:cliente'])->group(function () {
    Route::get('/cliente', function () {
        return view('cliente.dashboard');
    })->name('cliente.dashboard');
    
    // Vista de perfil del cliente autenticado
    Route::get('/mi-perfil', [ClienteController::class, 'miPerfil'])->name('clientes.mi-perfil');
});

require __DIR__.'/auth.php';
