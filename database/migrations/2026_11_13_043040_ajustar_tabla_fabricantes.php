<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fabricantes', function (Blueprint $table) {
            $table->renameColumn('nombre', 'empresa');
            $table->dropColumn(['pais', 'contacto', 'telefono', 'correo']);
        });

        Schema::table('fabricantes', function (Blueprint $table) {
            $table->enum('categoria', ['Quimicos', 'Semilleros', 'Maquinaria']);
            $table->decimal('limite_credito', 12, 2);
            $table->enum('dias_credito', [15, 30, 45, 60]);
        });
    }

    public function down(): void
    {
        Schema::table('fabricantes', function (Blueprint $table) {
            $table->dropColumn(['categoria', 'limite_credito', 'dias_credito']);
        });

        Schema::table('fabricantes', function (Blueprint $table) {
            $table->renameColumn('empresa', 'nombre');
            $table->string('pais')->nullable();
            $table->string('contacto')->nullable();
            $table->string('telefono', 8)->nullable();
            $table->string('correo')->nullable();
        });
    }
};
