<x-app-layout>
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Proveedores</h2>
                <p class="text-muted">Administración de proveedores agrícolas</p>
            </div>
            <a href="{{ route('proveedores.create') }}" class="btn btn-success">
                Nuevo proveedor
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-success">
                        <tr>
                            <th>RTN</th>
                            <th>Empresa</th>
                            <th>Categoría</th>
                            <th>Límite de crédito</th>
                            <th>Días de crédito</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($proveedores as $proveedor)
                            <tr>
                                <td>{{ $proveedor->rtn }}</td>
                                <td>{{ $proveedor->empresa }}</td>
                                <td>{{ $proveedor->categoria }}</td>
                                <td>L. {{ number_format($proveedor->limite_credito, 2) }}</td>
                                <td>{{ $proveedor->dias_credito }} días</td>
                                <td>
                                    <span class="badge {{ $proveedor->estado == 'Activo' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $proveedor->estado }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('proveedores.edit', $proveedor->id) }}"
                                       class="btn btn-sm btn-warning">Editar</a>

                                    <form action="{{ route('proveedores.destroy', $proveedor->id) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('¿Eliminar proveedor?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    No hay proveedores registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
