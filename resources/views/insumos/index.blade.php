<x-app-layout>
    <x-slot name="header">
        Gestión de Insumos Agropecuarios
    </x-slot>

    <div class="container-fluid">

        <div class="d-flex justify-content-between mb-4">
            <h4>Listado de Insumos</h4>

            <a href="{{ route('insumos.create') }}"
               class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nuevo Insumo
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body table-responsive">

                <table class="table table-striped table-hover">
                    <thead class="table-success">
                        <tr>
                            <th>SKU</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Fabricante</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($insumos as $insumo)
                            <tr>
                                <td>{{ $insumo->sku }}</td>
                                <td>{{ $insumo->nombre }}</td>
                                <td>{{ $insumo->categoria }}</td>
                                <td>L. {{ number_format($insumo->precio, 2) }}</td>
                                <td>{{ $insumo->stock }}</td>
                                <td>{{ $insumo->fabricante }}</td>
                                <td>
                                    <a href="{{ route('insumos.edit', $insumo) }}"
                                       class="btn btn-warning btn-sm">
                                        Editar
                                    </a>

                                    <form action="{{ route('insumos.destroy', $insumo) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Eliminar este insumo?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    No hay insumos registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
