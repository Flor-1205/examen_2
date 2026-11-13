<x-app-layout>
    <x-slot name="header">
        Editar Proveedor
    </x-slot>

    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                Actualizar información del proveedor
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p class="mb-0">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('proveedores.update', $proveedor) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">RTN (14 dígitos)</label>
                            <input type="text" name="rtn" maxlength="14"
                                class="form-control"
                                value="{{ old('rtn', $proveedor->rtn) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Empresa</label>
                            <input type="text" name="empresa" class="form-control"
                                value="{{ old('empresa', $proveedor->empresa) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Categoría</label>
                            <select name="categoria" class="form-select" required>
                                @foreach(['Químicos', 'Semilleros', 'Maquinaria'] as $categoria)
                                    <option value="{{ $categoria }}"
                                        {{ old('categoria', $proveedor->categoria) == $categoria ? 'selected' : '' }}>
                                        {{ $categoria }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Contacto</label>
                            <input type="text" name="contacto" class="form-control"
                                value="{{ old('contacto', $proveedor->contacto) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono" maxlength="8"
                                class="form-control"
                                value="{{ old('telefono', $proveedor->telefono) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Límite de crédito (L.)</label>
                            <input type="number" name="limite_credito" step="0.01"
                                min="0" class="form-control"
                                value="{{ old('limite_credito', $proveedor->limite_credito) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Días de crédito</label>
                            <select name="dias_credito" class="form-select" required>
                                @foreach([15, 30, 45, 60] as $dias)
                                    <option value="{{ $dias }}"
                                        {{ old('dias_credito', $proveedor->dias_credito) == $dias ? 'selected' : '' }}>
                                        {{ $dias }} días
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-select" required>
                                @foreach(['Activo', 'Inactivo'] as $estado)
                                    <option value="{{ $estado }}"
                                        {{ old('estado', $proveedor->estado) == $estado ? 'selected' : '' }}>
                                        {{ $estado }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">
                        Actualizar Proveedor
                    </button>

                    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
