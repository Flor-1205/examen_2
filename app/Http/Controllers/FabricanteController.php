<?php

namespace App\Http\Controllers;

use App\Models\Fabricante;
use Illuminate\Http\Request;

class FabricanteController extends Controller
{
    public function index()
    {
        $fabricantes = Fabricante::all();
        return view('fabricantes.index', compact('fabricantes'));
    }

    public function create()
    {
        return view('fabricantes.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'rtn' => 'required|digits:14|unique:fabricantes,rtn',
            'empresa' => 'required|string|max:255',
            'categoria' => 'required|in:Quimicos,Semilleros,Maquinaria',
            'limite_credito' => 'required|numeric|min:0',
            'dias_credito' => 'required|in:15,30,45,60',
            'estado' => 'required|in:Activo,Inactivo'
        ]);

        Fabricante::create($datos);

        return redirect()->route('fabricantes.index')
            ->with('success', 'Fabricante registrado correctamente.');
    }

    public function edit(Fabricante $fabricante)
    {
        return view('fabricantes.edit', compact('fabricante'));
    }

    public function update(Request $request, Fabricante $fabricante)
    {
        $datos = $request->validate([
            'rtn' => 'required|digits:14|unique:fabricantes,rtn,' . $fabricante->id,
            'empresa' => 'required|string|max:255',
            'categoria' => 'required|in:Quimicos,Semilleros,Maquinaria',
            'limite_credito' => 'required|numeric|min:0',
            'dias_credito' => 'required|in:15,30,45,60',
            'estado' => 'required|in:Activo,Inactivo'
        ]);

        $fabricante->update($datos);

        return redirect()->route('fabricantes.index')
            ->with('success', 'Fabricante actualizado correctamente.');
    }

    public function destroy(Fabricante $fabricante)
    {
        $fabricante->delete();

        return redirect()->route('fabricantes.index')
            ->with('success', 'Fabricante eliminado correctamente.');
    }
}
