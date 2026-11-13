<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InsumoController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $insumos = Insumo::where(function ($query) use ($buscar) {
            $query->where('nombre', 'LIKE', "%{$buscar}%")
                  ->orWhere('sku', 'LIKE', "%{$buscar}%");
        })
        ->orderBy('id', 'desc')
        ->paginate(10)
        ->withQueryString();

        return view('insumos.index', compact('insumos', 'buscar'));
    }

    public function create()
    {
        return view('insumos.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'sku' => 'required|string|max:50|unique:insumos,sku',
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'costo' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'fabricante' => 'nullable|string|max:255',
            'fecha_vencimiento' => 'nullable|date'
        ]);

        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $request->file('imagen')->store('insumos', 'public');
        }

        Insumo::create($datos);

        return redirect()->route('insumos.index')
            ->with('success', 'Insumo registrado correctamente.');
    }

    public function edit(Insumo $insumo)
    {
        return view('insumos.edit', compact('insumo'));
    }

    public function update(Request $request, Insumo $insumo)
    {
        $datos = $request->validate([
            'sku' => 'required|string|max:50|unique:insumos,sku,' . $insumo->id,
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'costo' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'fabricante' => 'nullable|string|max:255',
            'fecha_vencimiento' => 'nullable|date'
        ]);

        if ($request->hasFile('imagen')) {
            if ($insumo->imagen) {
                Storage::disk('public')->delete($insumo->imagen);
            }

            $datos['imagen'] = $request->file('imagen')->store('insumos', 'public');
        }

        $insumo->update($datos);

        return redirect()->route('insumos.index')
            ->with('success', 'Insumo actualizado correctamente.');
    }

    public function destroy(Insumo $insumo)
    {
        if ($insumo->imagen) {
            Storage::disk('public')->delete($insumo->imagen);
        }

        $insumo->delete();

        return redirect()->route('insumos.index')
            ->with('success', 'Insumo eliminado correctamente.');
    }
}
