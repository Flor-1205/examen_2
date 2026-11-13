<x-app-layout>
    <div class="container-fluid">
        <h2 class="fw-bold mb-4">Editar fabricante</h2>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form action="{{ route('fabricantes.update', $fabricante->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">RTN</label>
                            <input type="text" name="rtn" maxlength="14"
                                class="form-control"
                                value="{{ old('rtn', $fabricante->rtn) }}" required>
                            @error('rtn') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Empresa o razón social</label>
                            <input type="text" name="empresa" class="form-control"
                                value="{{ old('empresa', $fabricante->empresa) }}" required>
                            @error('empresa') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Categoría</label>
                            <select name="categoria" class="form-select" required>
                                <option value="Quimicos" {{ $fabricante->categoria == 'Quimicos' ? 'selected' : '' }}>Químicos</option>
                                <option value="Semilleros" {{ $fabricante->categoria == 'Semilleros' ? 'selected' : '' }}>Semilleros</option>
                                <option value="Maquinaria" {{ $fabricante->categoria == 'Maquinaria' ? 'selected' : '' }}>Maquinaria</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Límite de crédito (L.)</label>
                            <input type="number" step="0.01" min="0"
                                name="limite_credito" class="form-control"
                                value="{{ old('limite_credito', $fabricante->limite_credito) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Días de crédito</label>
                            <select name="dias_credito" class="form-select" required>
                                @foreach([15, 30, 45, 60] as $dias)
                                    <option value="{{ $dias }}" {{ $fabricante->dias_credito == $dias ? 'selected' : '' }}>
                                        {{ $dias }} días
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select" required>
                                <option value="Activo" {{ $fabricante->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                                <option value="Inactivo" {{ $fabricante->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Actualizar fabricante</button>
                    <a href="{{ route('fabricantes.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
