<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Muestra la lista de usuarios
     */
    public function index(): View
    {
        $users = User::with('role')->orderBy('name')->get();
        $roles = Role::all();

        return view('users.index', compact('users', 'roles'));
    }

    /**
     * Cambia el rol de un usuario
     */
    public function updateRole(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('users.index')
            ->with('success', "Rol de {$user->name} actualizado exitosamente.");
    }
}
