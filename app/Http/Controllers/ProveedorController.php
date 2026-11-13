<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rtn' => 'required|digits:14|unique:proveedores,rtn',
            'empresa' => 'required|string|max:255',
            'categoria' => 'required|in:Químicos,Semilleros,Maquinaria',
            'contacto' => 'required|string|max:255',
            'telefono' => 'required|digits:8',
            'limite_credito' => 'required|numeric|min:0',
            'dias_credito' => 'required|in:15,30,45,60',
            'estado' => 'required|in:Activo,Inactivo',
        ]);

        Proveedor::create($request->all());

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor registrado correctamente.');
    }

    public function edit(Proveedor $proveedore)
    {
        return view('proveedores.edit', [
            'proveedor' => $proveedore
        ]);
    }

    public function update(Request $request, Proveedor $proveedore)
    {
        $request->validate([
            'rtn' => 'required|digits:14|unique:proveedores,rtn,' . $proveedore->id,
            'empresa' => 'required|string|max:255',
            'categoria' => 'required|in:Químicos,Semilleros,Maquinaria',
            'contacto' => 'required|string|max:255',
            'telefono' => 'required|digits:8',
            'limite_credito' => 'required|numeric|min:0',
            'dias_credito' => 'required|in:15,30,45,60',
            'estado' => 'required|in:Activo,Inactivo',
        ]);

        $proveedore->update($request->all());

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy(Proveedor $proveedore)
    {
        $proveedore->delete();

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor eliminado correctamente.');
    }
}
