<x-app-layout>
    <x-slot name="header">
        Registrar Proveedor
    </x-slot>

    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                Información del proveedor
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p class="mb-0">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('proveedores.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">RTN (14 dígitos)</label>
                            <input type="text" name="rtn" maxlength="14"
                                class="form-control" value="{{ old('rtn') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombre de la empresa</label>
                            <input type="text" name="empresa" class="form-control"
                                value="{{ old('empresa') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Categoría</label>
                            <select name="categoria" class="form-select" required>
                                <option value="">Seleccione</option>
                                @foreach(['Químicos', 'Semilleros', 'Maquinaria'] as $categoria)
                                    <option value="{{ $categoria }}"
                                        {{ old('categoria') == $categoria ? 'selected' : '' }}>
                                        {{ $categoria }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Contacto (asesor comercial)</label>
                            <input type="text" name="contacto" class="form-control"
                                value="{{ old('contacto') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Teléfono (8 dígitos)</label>
                            <input type="text" name="telefono" maxlength="8"
                                class="form-control" value="{{ old('telefono') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Límite de crédito (L.)</label>
                            <input type="number" name="limite_credito" step="0.01"
                                min="0" class="form-control"
                                value="{{ old('limite_credito') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Días de crédito</label>
                            <select name="dias_credito" class="form-select" required>
                                <option value="">Seleccione</option>
                                @foreach([15, 30, 45, 60] as $dias)
                                    <option value="{{ $dias }}"
                                        {{ old('dias_credito') == $dias ? 'selected' : '' }}>
                                        {{ $dias }} días
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select" required>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">
                        Guardar Proveedor
                    </button>

                    <a href="{{ route('proveedores.index') }}"
                       class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
