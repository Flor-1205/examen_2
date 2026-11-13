<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;

class InsumoController extends Controller
{
    public function index()
    {
        $insumos = Insumo::all();

        return view('insumos.index', compact('insumos'));
    }

    public function create()
    {
        return view('insumos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sku' => 'required|unique:insumos,sku',
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'costo' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'fabricante' => 'nullable|string|max:255',
            'fecha_vencimiento' => 'nullable|date',
        ]);

        $datos = $request->all();

        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $request->file('imagen')
                ->store('insumos', 'public');
        }

        Insumo::create($datos);

        return redirect()->route('insumos.index')
            ->with('success', 'Insumo registrado correctamente.');
    }

    public function show(Insumo $insumo)
    {
        return view('insumos.show', compact('insumo'));
    }

    public function edit(Insumo $insumo)
    {
        return view('insumos.edit', compact('insumo'));
    }

    public function update(Request $request, Insumo $insumo)
    {
        $request->validate([
            'sku' => 'required|unique:insumos,sku,' . $insumo->id,
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'costo' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'fabricante' => 'nullable|string|max:255',
            'fecha_vencimiento' => 'nullable|date',
        ]);

        $datos = $request->all();

        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $request->file('imagen')
                ->store('insumos', 'public');
        }

        $insumo->update($datos);

        return redirect()->route('insumos.index')
            ->with('success', 'Insumo actualizado correctamente.');
    }

    public function destroy(Insumo $insumo)
    {
        $insumo->delete();

        return redirect()->route('insumos.index')
            ->with('success', 'Insumo eliminado correctamente.');
    }
}
