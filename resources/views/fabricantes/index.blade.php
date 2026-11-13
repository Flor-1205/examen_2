<x-app-layout>
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Fabricantes</h2>
                <p class="text-muted">Administración de fabricantes agrícolas</p>
            </div>
            <a href="{{ route('fabricantes.create') }}" class="btn btn-success">
                Nuevo fabricante
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
                        @forelse($fabricantes as $fabricante)
                            <tr>
                                <td>{{ $fabricante->rtn }}</td>
                                <td>{{ $fabricante->empresa }}</td>
                                <td>{{ $fabricante->categoria }}</td>
                                <td>L. {{ number_format($fabricante->limite_credito, 2) }}</td>
                                <td>{{ $fabricante->dias_credito }} días</td>
                                <td>
                                    <span class="badge {{ $fabricante->estado == 'Activo' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $fabricante->estado }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('fabricantes.edit', $fabricante->id) }}"
                                       class="btn btn-sm btn-warning">Editar</a>

                                    <form action="{{ route('fabricantes.destroy', $fabricante->id) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('¿Eliminar fabricante?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    No hay fabricantes registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
