<x-app-layout>
    <x-slot name="header">
        Editar Insumo
    </x-slot>

    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                Actualizar información del insumo
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p class="mb-0">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('insumos.update', $insumo) }}"
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Código SKU</label>
                            <input type="text" name="sku" class="form-control"
                                   value="{{ old('sku', $insumo->sku) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control"
                                   value="{{ old('nombre', $insumo->nombre) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Categoría</label>
                            <select name="categoria" class="form-select" required>
                                @foreach (['Fertilizantes', 'Semillas', 'Plaguicidas', 'Herramientas', 'Otros'] as $categoria)
                                    <option value="{{ $categoria }}"
                                        {{ old('categoria', $insumo->categoria) == $categoria ? 'selected' : '' }}>
                                        {{ $categoria }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fabricante</label>
                            <input type="text" name="fabricante" class="form-control"
                                   value="{{ old('fabricante', $insumo->fabricante) }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Precio (L.)</label>
                            <input type="number" step="0.01" min="0" name="precio"
                                   class="form-control"
                                   value="{{ old('precio', $insumo->precio) }}" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Costo (L.)</label>
                            <input type="number" step="0.01" min="0" name="costo"
                                   class="form-control"
                                   value="{{ old('costo', $insumo->costo) }}" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Stock</label>
                            <input type="number" min="0" name="stock"
                                   class="form-control"
                                   value="{{ old('stock', $insumo->stock) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha de vencimiento</label>
                            <input type="date" name="fecha_vencimiento"
                                   class="form-control"
                                   value="{{ old('fecha_vencimiento', $insumo->fecha_vencimiento) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nueva imagen</label>
                            <input type="file" name="imagen" class="form-control"
                                   accept="image/*">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">
                        Actualizar Insumo
                    </button>

                    <a href="{{ route('insumos.index') }}"
                       class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
