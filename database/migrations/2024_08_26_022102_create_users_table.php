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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del usuario
            $table->string('email')->unique(); // Email del usuario (único)
            $table->timestamp('email_verified_at')->nullable(); // Fecha de verificación del email
            $table->string('password'); // Contraseña del usuario
            $table->rememberToken(); // Token para "remember me"
            $table->string('telefono')->nullable(); // Teléfono del usuario
            $table->string('direccion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
