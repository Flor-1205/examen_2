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
        $request->validate([
            'identidad' => 'required|digits:13|unique:empleados,identidad',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
            'fecha_contratacion' => 'required|date',
            'estado' => 'required|in:Activo,Inactivo'
        ]);

        Empleado::create($request->only([
            'identidad',
            'nombres',
            'apellidos',
            'cargo',
            'salario',
            'fecha_contratacion',
            'estado'
        ]));

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado registrado correctamente.');
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'identidad' => 'required|digits:13|unique:empleados,identidad,' . $empleado->id,
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'cargo' => 'required|string|max:255',
            'salario' => 'required|numeric|min:0',
            'fecha_contratacion' => 'required|date',
            'estado' => 'required|in:Activo,Inactivo'
        ]);

        $empleado->update($request->only([
            'identidad',
            'nombres',
            'apellidos',
            'cargo',
            'salario',
            'fecha_contratacion',
            'estado'
        ]));

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