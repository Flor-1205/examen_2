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
                            <label class="form-label">Nombre del fabricante</label>
                            <input type="text" name="nombre" class="form-control"
                                value="{{ old('nombre', $fabricante->nombre) }}" required>
                            @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">RTN</label>
                            <input type="text" name="rtn" maxlength="14" class="form-control"
                                value="{{ old('rtn', $fabricante->rtn) }}" required>
                            @error('rtn') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">País</label>
                            <input type="text" name="pais" class="form-control"
                                value="{{ old('pais', $fabricante->pais) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Persona de contacto</label>
                            <input type="text" name="contacto" class="form-control"
                                value="{{ old('contacto', $fabricante->contacto) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono" maxlength="8" class="form-control"
                                value="{{ old('telefono', $fabricante->telefono) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Correo electrónico</label>
                            <input type="email" name="correo" class="form-control"
                                value="{{ old('correo', $fabricante->correo) }}">
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
