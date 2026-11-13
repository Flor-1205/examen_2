
<x-app-layout>

    <style>
        .dashboard {
            padding: 20px 5px;
        }

        .welcome-box {
            background: linear-gradient(120deg, #1d5935, #368454);
            color: white;
            padding: 28px;
            border-radius: 16px;
            margin-bottom: 28px;
            box-shadow: 0 5px 15px rgba(30, 75, 45, .12);
        }

        .welcome-box h2 {
            font-weight: 700;
            margin-bottom: 8px;
            font-size: 25px;
        }

        .welcome-box p {
            margin: 0;
            opacity: .9;
            font-size: 14px;
        }

        .stat-card {
            background: white;
            border-radius: 14px;
            padding: 22px;
            border: 1px solid #edf0ed;
            box-shadow: 0 4px 12px rgba(0,0,0,.04);
            height: 100%;
            transition: .2s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0,0,0,.08);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            margin-bottom: 17px;
        }

        .stat-card h3 {
            font-size: 25px;
            font-weight: 800;
            color: #263b2d;
            margin-bottom: 5px;
        }

        .stat-card p {
            color: #849087;
            font-size: 13px;
            margin: 0;
        }

        .icon-green {
            background: #e4f3e8;
            color: #267345;
        }

        .icon-blue {
            background: #e6effb;
            color: #3975b9;
        }

        .icon-orange {
            background: #fff0df;
            color: #d58a32;
        }

        .icon-purple {
            background: #f0e9fb;
            color: #8055b5;
        }

        .section-card {
            background: white;
            border-radius: 14px;
            padding: 22px;
            border: 1px solid #edf0ed;
            box-shadow: 0 4px 12px rgba(0,0,0,.04);
            margin-top: 25px;
        }

        .section-card h5 {
            color: #263b2d;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .stock-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 13px 0;
            border-bottom: 1px solid #f0f2f0;
            gap: 10px;
        }

        .stock-item:last-child {
            border-bottom: none;
        }

        .stock-name {
            color: #344b3a;
            font-weight: 600;
            font-size: 14px;
        }

        .stock-badge {
            background: #fde8e7;
            color: #c0392b;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .empty-stock {
            background: #e8f5eb;
            color: #267345;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            font-size: 14px;
        }
    </style>

    <div class="dashboard">

        <!-- Bienvenida -->
        <div class="welcome-box">
            <h2>¡Bienvenido a AGROVALLE! 🌱</h2>
            <p>
                Panel administrativo de gestión y control
                de la distribuidora agropecuaria.
            </p>
        </div>

        <!-- Indicadores -->
        <div class="row g-4">

            <!-- Empleados -->
            <div class="col-xl-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon icon-green">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <h3>{{ $totalEmpleados }}</h3>
                    <p>Total de empleados en nómina</p>
                </div>
            </div>

            <!-- Insumos -->
            <div class="col-xl-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon icon-blue">
                        <i class="bi bi-box-seam-fill"></i>
                    </div>

                    <h3>{{ $totalInsumos }}</h3>
                    <p>Insumos en catálogo</p>
                </div>
            </div>

            <!-- Proveedores -->
            <div class="col-xl-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon icon-orange">
                        <i class="bi bi-truck"></i>
                    </div>

                    <h3>{{ $totalProveedores }}</h3>
                    <p>Proveedores activos</p>
                </div>
            </div>

            <!-- Inventario -->
            <div class="col-xl-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon icon-purple">
                        <i class="bi bi-cash-stack"></i>
                    </div>

                    <h3 style="font-size: 21px;">
                        L. {{ number_format($valorInventario, 2) }}
                    </h3>

                    <p>Valor total del inventario agrícola</p>
                </div>
            </div>

        </div>

        <!-- Alertas de inventario -->
        <div class="section-card">

            <h5>
                <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
                Alertas de inventario
            </h5>

            @forelse($insumosBajos as $insumo)

                <div class="stock-item">

                    <div>
                        <div class="stock-name">
                            {{ $insumo->nombre }}
                        </div>

                        <small class="text-muted">
                            SKU: {{ $insumo->sku }}
                        </small>
                    </div>

                    <span class="stock-badge">
                        {{ $insumo->stock }} unidades
                    </span>

                </div>

            @empty

                <div class="empty-stock">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    Todos los insumos tienen un nivel de stock adecuado.
                </div>

            @endforelse

        </div>

    </div>

</x-app-layout>
