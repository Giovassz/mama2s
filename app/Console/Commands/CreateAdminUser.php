<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create 
                            {--email=admin@mama2s.com : Email del usuario admin}
                            {--password=password : Contraseña del usuario admin}
                            {--name=Administrador : Nombre del usuario admin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea un usuario administrador o muestra las credenciales si ya existe';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->option('email');
        $password = $this->option('password');
        $name = $this->option('name');

        // Buscar si ya existe un usuario admin con ese email
        $existingUser = User::where('email', $email)->first();

        if ($existingUser) {
            $adminRole = Role::where('slug', 'admin')->first();
            
            // Si el usuario existe pero no es admin, cambiarle el rol
            if (!$existingUser->isAdmin()) {
                $existingUser->role_id = $adminRole->id;
                $existingUser->save();
                $this->info("✓ Usuario existente actualizado a administrador!");
            } else {
                $this->info("✓ Usuario administrador ya existe!");
            }

            $this->line("");
            $this->line("═══════════════════════════════════════════");
            $this->line("  CREDENCIALES DE ADMINISTRADOR");
            $this->line("═══════════════════════════════════════════");
            $this->line("  Email: {$existingUser->email}");
            $this->line("  Contraseña: (la que configuraste anteriormente)");
            $this->line("═══════════════════════════════════════════");
            
            return 0;
        }

        // Verificar que exista el rol admin
        $adminRole = Role::where('slug', 'admin')->first();
        
        if (!$adminRole) {
            $this->error("El rol 'admin' no existe. Ejecuta primero: php artisan db:seed --class=RoleSeeder");
            return 1;
        }

        // Crear el usuario admin
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role_id' => $adminRole->id,
        ]);

        $this->info("✓ Usuario administrador creado exitosamente!");
        $this->line("");
        $this->line("═══════════════════════════════════════════");
        $this->line("  CREDENCIALES DE ADMINISTRADOR");
        $this->line("═══════════════════════════════════════════");
        $this->line("  Email: {$email}");
        $this->line("  Contraseña: {$password}");
        $this->line("═══════════════════════════════════════════");
        $this->line("");
        $this->info("Puedes iniciar sesión con estas credenciales.");

        return 0;
    }
}
