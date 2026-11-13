<x-app-layout>
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold">Recursos Humanos</h2>
                <p class="text-muted">Administración del personal de AGROVALLE HONDURAS</p>
            </div>
            <a href="{{ route('empleados.create') }}" class="btn btn-success">
                Nuevo empleado
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
                            <th>Identidad</th>
                            <th>Nombre</th>
                            <th>Cargo</th>
                            <th>Sueldo base</th>
                            <th>Fecha de ingreso</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($empleados as $empleado)
                            <tr>
                                <td>{{ $empleado->identidad }}</td>
                                <td>{{ $empleado->nombre }}</td>
                                <td>{{ $empleado->cargo }}</td>
                                <td>L. {{ number_format($empleado->sueldo_base, 2) }}</td>
                                <td>{{ $empleado->fecha_ingreso }}</td>
                                <td>
                                    <span class="badge {{ $empleado->estado == 'Activo' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $empleado->estado }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('empleados.edit', $empleado->id) }}"
                                       class="btn btn-sm btn-warning">Editar</a>

                                    <form action="{{ route('empleados.destroy', $empleado->id) }}"
                                          method="POST" class="d-inline"
                                          onsubmit="return confirm('¿Eliminar empleado?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    No hay empleados registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
