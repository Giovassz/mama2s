<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('membresias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 10, 2);
            $table->integer('duracion_dias'); // Duración en días
            $table->boolean('activo')->default(true);
            $table->json('caracteristicas')->nullable(); // Array de características como JSON
            $table->integer('sesiones_entrenador')->default(0); // Número de sesiones con entrenador
            $table->boolean('acceso_clases_grupales')->default(false);
            $table->boolean('acceso_zona_vip')->default(false);
            $table->boolean('plan_nutricional')->default(false);
            $table->integer('orden')->default(0); // Para ordenar las membresías
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membresias');
    }
};
