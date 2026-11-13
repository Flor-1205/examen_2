<x-app-layout>
    <div class="container-fluid">
        <h2 class="fw-bold mb-4">Registrar fabricante</h2>

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form action="{{ route('fabricantes.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombre del fabricante</label>
                            <input type="text" name="nombre" class="form-control"
                                value="{{ old('nombre') }}" required>
                            @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">RTN</label>
                            <input type="text" name="rtn" maxlength="14" class="form-control"
                                value="{{ old('rtn') }}" required>
                            @error('rtn') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">País</label>
                            <input type="text" name="pais" class="form-control"
                                value="{{ old('pais') }}" required>
                            @error('pais') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Persona de contacto</label>
                            <input type="text" name="contacto" class="form-control"
                                value="{{ old('contacto') }}" required>
                            @error('contacto') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono" maxlength="8" class="form-control"
                                value="{{ old('telefono') }}" required>
                            @error('telefono') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Correo electrónico</label>
                            <input type="email" name="correo" class="form-control"
                                value="{{ old('correo') }}">
                            @error('correo') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select" required>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Guardar fabricante</button>
                    <a href="{{ route('fabricantes.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
