<x-app-layout>
    <div class="container-fluid">
        <h2 class="fw-bold mb-4">Editar empleado</h2>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Número de identidad</label>
                            <input type="text" name="identidad" maxlength="13"
                                class="form-control" value="{{ old('identidad', $empleado->identidad) }}" required>
                            @error('identidad') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombres</label>
                            <input type="text" name="nombres" class="form-control"
                                value="{{ old('nombres', $empleado->nombres) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control"
                                value="{{ old('apellidos', $empleado->apellidos) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Cargo</label>
                            <input type="text" name="cargo" class="form-control"
                                value="{{ old('cargo', $empleado->cargo) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Salario (L.)</label>
                            <input type="number" step="0.01" min="0" name="salario"
                                class="form-control" value="{{ old('salario', $empleado->salario) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha de contratación</label>
                            <input type="date" name="fecha_contratacion"
                                class="form-control" value="{{ old('fecha_contratacion', $empleado->fecha_contratacion) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select" required>
                                <option value="Activo" {{ $empleado->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                                <option value="Inactivo" {{ $empleado->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Actualizar empleado</button>
                    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
