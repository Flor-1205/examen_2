<x-app-layout>
    <x-slot name="header">
        Gestión de Proveedores
    </x-slot>

    <div class="container-fluid">

        <div class="d-flex justify-content-between mb-4">
            <h4>Listado de Proveedores</h4>

            <a href="{{ route('proveedores.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nuevo Proveedor
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-success">
                        <tr>
                            <th>RTN</th>
                            <th>Empresa</th>
                            <th>Categoría</th>
                            <th>Contacto</th>
                            <th>Teléfono</th>
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
                                <td>{{ $proveedor->contacto }}</td>
                                <td>{{ $proveedor->telefono }}</td>
                                <td>L. {{ number_format($proveedor->limite_credito, 2) }}</td>
                                <td>{{ $proveedor->dias_credito }} días</td>
                                <td>
                                    <span class="badge {{ $proveedor->estado == 'Activo' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $proveedor->estado }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('proveedores.edit', $proveedor) }}"
                                       class="btn btn-warning btn-sm">Editar</a>

                                    <form action="{{ route('proveedores.destroy', $proveedor) }}"
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Eliminar este proveedor?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">
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
