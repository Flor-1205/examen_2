<x-app-layout>
    <x-slot name="header">
        Registrar Nuevo Insumo
    </x-slot>

    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                Información del Insumo
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('insumos.store') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Código SKU</label>
                            <input type="text" name="sku" class="form-control"
                                   value="{{ old('sku') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombre del insumo</label>
                            <input type="text" name="nombre" class="form-control"
                                   value="{{ old('nombre') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Categoría</label>
                            <select name="categoria" class="form-select" required>
                                <option value="">Seleccione una categoría</option>
                                <option value="Fertilizantes">Fertilizantes</option>
                                <option value="Semillas Certificadas">Semillas Certificadas</option>
                                <option value="Agroquímicos">Agroquímicos</option>
                                <option value="Herramientas">Herramientas</option>
                                <option value="Sistemas de Riego">Sistemas de Riego</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fabricante</label>
                            <input type="text" name="fabricante" class="form-control"
                                   value="{{ old('fabricante') }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Precio de venta (L.)</label>
                            <input type="number" step="0.01" min="0"
                                   name="precio" class="form-control"
                                   value="{{ old('precio') }}" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Costo (L.)</label>
                            <input type="number" step="0.01" min="0"
                                   name="costo" class="form-control"
                                   value="{{ old('costo') }}" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Cantidad en stock</label>
                            <input type="number" min="0" name="stock"
                                   class="form-control"
                                   value="{{ old('stock', 0) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha de vencimiento</label>
                            <input type="date" name="fecha_vencimiento"
                                   class="form-control"
                                   value="{{ old('fecha_vencimiento') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Imagen del insumo</label>
                            <input type="file" name="imagen"
                                   class="form-control" accept="image/*">
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-success">
                            Guardar Insumo
                        </button>

                        <a href="{{ route('insumos.index') }}"
                           class="btn btn-secondary">
                            Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
