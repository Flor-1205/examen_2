<x-app-layout>
    <div class="container-fluid">
        <h2 class="fw-bold mb-4">Editar empleado</h2>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Identidad</label>
                            <input type="text" name="identidad" maxlength="13"
                                class="form-control"
                                value="{{ old('identidad', $empleado->identidad) }}" required>
                            @error('identidad') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombre completo</label>
                            <input type="text" name="nombre" class="form-control"
                                value="{{ old('nombre', $empleado->nombre) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Cargo</label>
                            <select name="cargo" class="form-select" required>
                                @foreach([
                                    'Ingeniero Agrónomo',
                                    'Asesor Técnico de Campo',
                                    'Jefe de Bodega Central',
                                    'Operador de Maquinaria'
                                ] as $cargo)
                                    <option value="{{ $cargo }}"
                                        {{ $empleado->cargo == $cargo ? 'selected' : '' }}>
                                        {{ $cargo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sueldo base (L.)</label>
                            <input type="number" name="sueldo_base" step="0.01" min="0"
                                class="form-control"
                                value="{{ old('sueldo_base', $empleado->sueldo_base) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha de ingreso</label>
                            <input type="date" name="fecha_ingreso"
                                class="form-control"
                                value="{{ old('fecha_ingreso', $empleado->fecha_ingreso) }}" required>
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
