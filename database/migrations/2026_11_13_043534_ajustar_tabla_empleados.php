<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->renameColumn('nombres', 'nombre');
            $table->dropColumn('apellidos');
            $table->renameColumn('salario', 'sueldo_base');
            $table->renameColumn('fecha_contratacion', 'fecha_ingreso');
        });
    }

    public function down(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->renameColumn('nombre', 'nombres');
            $table->string('apellidos')->nullable();
            $table->renameColumn('sueldo_base', 'salario');
            $table->renameColumn('fecha_ingreso', 'fecha_contratacion');
        });
    }
};
