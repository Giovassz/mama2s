<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Página de inicio (pública)
Route::get('/', function () {
    return view('home');
})->name('home');

// Rutas públicas
Route::get('/membresias', function () {
    return view('membresias');
})->name('membresias');

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

// Rutas protegidas por rol - Cliente
Route::middleware(['auth', 'role:cliente'])->group(function () {
    Route::get('/cliente', function () {
        return view('cliente.dashboard');
    })->name('cliente.dashboard');
});

require __DIR__.'/auth.php';
