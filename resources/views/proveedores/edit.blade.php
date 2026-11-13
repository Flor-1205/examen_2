<x-app-layout>
    <div class="container-fluid">
        <h2 class="fw-bold mb-4">Editar proveedor</h2>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">RTN</label>
                            <input type="text" name="rtn" maxlength="14"
                                class="form-control"
                                value="{{ old('rtn', $proveedor->rtn) }}" required>
                            @error('rtn') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Empresa o razón social</label>
                            <input type="text" name="empresa" class="form-control"
                                value="{{ old('empresa', $proveedor->empresa) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Categoría</label>
                            <select name="categoria" class="form-select" required>
                                @foreach(['Químicos', 'Semilleros', 'Maquinaria'] as $categoria)
                                    <option value="{{ $categoria }}"
                                        {{ $proveedor->categoria == $categoria ? 'selected' : '' }}>
                                        {{ $categoria }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Límite de crédito (L.)</label>
                            <input type="number" name="limite_credito" step="0.01" min="0"
                                class="form-control"
                                value="{{ old('limite_credito', $proveedor->limite_credito) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Días de crédito</label>
                            <select name="dias_credito" class="form-select" required>
                                @foreach([15, 30, 45, 60] as $dias)
                                    <option value="{{ $dias }}"
                                        {{ $proveedor->dias_credito == $dias ? 'selected' : '' }}>
                                        {{ $dias }} días
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select" required>
                                <option value="Activo" {{ $proveedor->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                                <option value="Inactivo" {{ $proveedor->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Actualizar proveedor</button>
                    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
