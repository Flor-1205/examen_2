<x-app-layout>
    <div class="container-fluid">
        <h2 class="fw-bold mb-4">Registrar nuevo empleado</h2>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form action="{{ route('empleados.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Número de identidad</label>
                            <input type="text" name="identidad" maxlength="13"
                                class="form-control" value="{{ old('identidad') }}" required>
                            @error('identidad') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombres</label>
                            <input type="text" name="nombres" class="form-control"
                                value="{{ old('nombres') }}" required>
                            @error('nombres') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control"
                                value="{{ old('apellidos') }}" required>
                            @error('apellidos') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Cargo</label>
                            <select name="cargo" class="form-select" required>
                                <option value="">Seleccione un cargo</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Vendedor">Vendedor</option>
                                <option value="Contador">Contador</option>
                                <option value="Bodeguero">Bodeguero</option>
                                <option value="Gerente">Gerente</option>
                            </select>
                            @error('cargo') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Salario (L.)</label>
                            <input type="number" step="0.01" min="0" name="salario"
                                class="form-control" value="{{ old('salario') }}" required>
                            @error('salario') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha de contratación</label>
                            <input type="date" name="fecha_contratacion"
                                class="form-control" value="{{ old('fecha_contratacion') }}" required>
                            @error('fecha_contratacion') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select" required>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Guardar empleado</button>
                    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

