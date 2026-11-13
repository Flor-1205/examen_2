<x-app-layout>
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Fabricantes</h2>
                <p class="text-muted">Administración de fabricantes de AGROVALLE HONDURAS</p>
            </div>

            <a href="{{ route('fabricantes.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nuevo fabricante
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-success">
                            <tr>
                                <th>Nombre</th>
                                <th>RTN</th>
                                <th>País</th>
                                <th>Contacto</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($fabricantes as $fabricante)
                                <tr>
                                    <td>{{ $fabricante->nombre }}</td>
                                    <td>{{ $fabricante->rtn }}</td>
                                    <td>{{ $fabricante->pais }}</td>
                                    <td>{{ $fabricante->contacto }}</td>
                                    <td>{{ $fabricante->telefono }}</td>
                                    <td>{{ $fabricante->correo ?? 'No registrado' }}</td>
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
                                              onsubmit="return confirm('¿Deseas eliminar este fabricante?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        No hay fabricantes registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
