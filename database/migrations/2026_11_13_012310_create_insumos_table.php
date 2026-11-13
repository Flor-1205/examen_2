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
    Schema::create('insumos', function (Blueprint $table) {
        $table->id();
        $table->string('sku', 50)->unique();
        $table->string('nombre');
        $table->string('categoria');
        $table->decimal('precio', 10, 2);
        $table->decimal('costo', 10, 2);
        $table->integer('stock')->default(0);
        $table->string('imagen')->nullable();
        $table->string('fabricante')->nullable();
        $table->date('fecha_vencimiento')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insumos');
    }
};
