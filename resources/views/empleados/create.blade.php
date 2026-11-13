<x-app-layout>
    <div class="container-fluid">
        <h2 class="fw-bold mb-4">Registrar empleado</h2>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form action="{{ route('empleados.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Identidad (13 dígitos)</label>
                            <input type="text" name="identidad" maxlength="13"
                                class="form-control" value="{{ old('identidad') }}" required>
                            @error('identidad') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombre completo</label>
                            <input type="text" name="nombre" class="form-control"
                                value="{{ old('nombre') }}" required>
                            @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Cargo</label>
                            <select name="cargo" class="form-select" required>
                                <option value="">Seleccione un cargo</option>
                                <option value="Ingeniero Agrónomo">Ingeniero Agrónomo</option>
                                <option value="Asesor Técnico de Campo">Asesor Técnico de Campo</option>
                                <option value="Jefe de Bodega Central">Jefe de Bodega Central</option>
                                <option value="Operador de Maquinaria">Operador de Maquinaria</option>
                            </select>
                            @error('cargo') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sueldo base (L.)</label>
                            <input type="number" name="sueldo_base" step="0.01" min="0"
                                class="form-control" value="{{ old('sueldo_base') }}" required>
                            @error('sueldo_base') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha de ingreso</label>
                            <input type="date" name="fecha_ingreso"
                                class="form-control" value="{{ old('fecha_ingreso') }}" required>
                            @error('fecha_ingreso') <small class="text-danger">{{ $message }}</small> @enderror
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
