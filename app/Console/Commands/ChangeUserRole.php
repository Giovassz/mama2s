<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;

class ChangeUserRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:change-role 
                            {email : El email del usuario}
                            {role : El slug del rol (admin, recepcionista, cliente)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cambia el rol de un usuario (admin, recepcionista, cliente)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $roleSlug = $this->argument('role');

        // Buscar el usuario
        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("Usuario con email '{$email}' no encontrado.");
            return 1;
        }

        // Buscar el rol
        $role = Role::where('slug', $roleSlug)->first();

        if (!$role) {
            $this->error("Rol '{$roleSlug}' no encontrado. Roles disponibles: admin, recepcionista, cliente");
            return 1;
        }

        // Guardar el rol anterior para el mensaje
        $oldRole = $user->role ? $user->role->name : 'sin rol';

        // Cambiar el rol
        $user->role_id = $role->id;
        $user->save();

        $this->info("✓ Rol cambiado exitosamente!");
        $this->line("  Usuario: {$user->name} ({$user->email})");
        $this->line("  Rol anterior: {$oldRole}");
        $this->line("  Nuevo rol: {$role->name}");

        return 0;
    }
}
