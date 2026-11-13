<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'identidad' => 'required|digits:13|unique:empleados,identidad',
            'nombre' => 'required|string|max:255',
            'cargo' => 'required|in:Ingeniero Agrónomo,Asesor Técnico de Campo,Jefe de Bodega Central,Operador de Maquinaria',
            'sueldo_base' => 'required|numeric|min:0',
            'fecha_ingreso' => 'required|date',
            'estado' => 'required|in:Activo,Inactivo'
        ]);

        Empleado::create($datos);

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado registrado correctamente.');
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $datos = $request->validate([
            'identidad' => 'required|digits:13|unique:empleados,identidad,' . $empleado->id,
            'nombre' => 'required|string|max:255',
            'cargo' => 'required|in:Ingeniero Agrónomo,Asesor Técnico de Campo,Jefe de Bodega Central,Operador de Maquinaria',
            'sueldo_base' => 'required|numeric|min:0',
            'fecha_ingreso' => 'required|date',
            'estado' => 'required|in:Activo,Inactivo'
        ]);

        $empleado->update($datos);

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado actualizado correctamente.');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado eliminado correctamente.');
    }
}
