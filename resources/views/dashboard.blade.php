<x-app-layout>
    <div class="container-fluid">

        <div class="mb-4">
            <h2 class="fw-bold">Panel principal</h2>
            <p class="text-muted">Bienvenida al sistema administrativo de AGROVALLE HONDURAS.</p>
        </div>

        <div class="row g-4">

            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-muted mb-1">Total de insumos</p>
                                <h3 class="fw-bold">{{ $totalInsumos }}</h3>
                            </div>
                            <i class="bi bi-box-seam fs-1 text-success"></i>
                        </div>
                        <small class="text-muted">Insumos registrados en el sistema</small>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-muted mb-1">Proveedores activos</p>
                                <h3 class="fw-bold">{{ $totalProveedores }}</h3>
                            </div>
                            <i class="bi bi-truck fs-1 text-primary"></i>
                        </div>
                        <small class="text-muted">Proveedores disponibles</small>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-muted mb-1">Empleados activos</p>
                                <h3 class="fw-bold">{{ $totalEmpleados }}</h3>
                            </div>
                            <i class="bi bi-people fs-1 text-warning"></i>
                        </div>
                        <small class="text-muted">Personal de la empresa</small>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-muted mb-1">Valor del inventario</p>
                                <h3 class="fw-bold">L. {{ number_format($valorInventario, 2) }}</h3>
                            </div>
                            <i class="bi bi-cash-stack fs-1 text-success"></i>
                        </div>
                        <small class="text-muted">Valor calculado según el costo y stock</small>
                    </div>
                </div>
            </div>

        </div>

        <div class="card border-0 shadow-sm mt-4">
            <div class="card-body">
                <h5 class="fw-bold">Bienvenida a AGROVALLE HONDURAS</h5>
                <p class="text-muted mb-0">
                    Desde este panel puedes administrar los insumos,
                    proveedores y empleados de la empresa.
                </p>
            </div>
        </div>

    </div>
</x-app-layout>

