<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EmpleadoController;
use App\Models\Insumo;
use App\Models\Proveedor;
use App\Models\Empleado;
use App\Http\Controllers\FabricanteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    $totalInsumos = Insumo::count();

    $totalProveedores = Proveedor::where('estado', 'Activo')->count();

    $totalEmpleados = Empleado::count();

    $insumosBajos = Insumo::where('stock', '<=', 5)->get();

    $valorInventario = Insumo::sum(
        \Illuminate\Support\Facades\DB::raw('stock * precio')
    );

    return view('dashboard', compact(
    'totalInsumos',
    'totalProveedores',
    'totalEmpleados',
    'valorInventario',
    'insumosBajos'
));

})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('insumos', InsumoController::class)->middleware('auth');
    Route::resource('proveedores', ProveedorController::class)->middleware('auth');
    Route::resource('empleados', EmpleadoController::class)->middleware('auth');
    Route::resource('fabricantes', FabricanteController::class)->middleware('auth');
});

require __DIR__.'/auth.php';
