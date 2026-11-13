<x-app-layout>
    <div class="container-fluid">
        <h2 class="fw-bold mb-4">Registrar proveedor</h2>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form action="{{ route('proveedores.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">RTN (14 dígitos)</label>
                            <input type="text" name="rtn" maxlength="14"
                                class="form-control" value="{{ old('rtn') }}" required>
                            @error('rtn') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Empresa o razón social</label>
                            <input type="text" name="empresa" class="form-control"
                                value="{{ old('empresa') }}" required>
                            @error('empresa') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Categoría</label>
                            <select name="categoria" class="form-select" required>
                                <option value="">Seleccione una categoría</option>
                                <option value="Químicos">Químicos</option>
                                <option value="Semilleros">Semilleros</option>
                                <option value="Maquinaria">Maquinaria</option>
                            </select>
                            @error('categoria') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Límite de crédito (L.)</label>
                            <input type="number" name="limite_credito" step="0.01" min="0"
                                class="form-control" value="{{ old('limite_credito') }}" required>
                            @error('limite_credito') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Días de crédito</label>
                            <select name="dias_credito" class="form-select" required>
                                <option value="">Seleccione los días</option>
                                @foreach([15, 30, 45, 60] as $dias)
                                    <option value="{{ $dias }}">{{ $dias }} días</option>
                                @endforeach
                            </select>
                            @error('dias_credito') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select" required>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Guardar proveedor</button>
                    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
