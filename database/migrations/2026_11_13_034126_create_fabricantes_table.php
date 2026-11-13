<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fabricantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('rtn', 14)->unique();
            $table->string('pais');
            $table->string('contacto');
            $table->string('telefono', 8);
            $table->string('correo')->nullable();
            $table->enum('estado', ['Activo', 'Inactivo'])->default('Activo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fabricantes');
    }
};
