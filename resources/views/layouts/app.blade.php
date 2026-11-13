<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGROVALLE HONDURAS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background-color: #174b35;
            position: fixed;
            top: 0;
            left: 0;
            color: white;
        }

        .sidebar h4 {
            padding: 25px 15px;
            text-align: center;
            font-weight: bold;
        }

        .sidebar a {
            display: block;
            color: #e8f5ed;
            text-decoration: none;
            padding: 13px 20px;
        }

        .sidebar a:hover {
            background-color: #26734d;
            color: white;
        }

        .contenido {
            margin-left: 250px;
        }

        .barra-superior {
            background: white;
            padding: 18px 25px;
            border-bottom: 1px solid #ddd;
        }

        .contenido-principal {
            padding: 25px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                min-height: auto;
                position: relative;
            }

            .contenido {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h4><i class="bi bi-flower1"></i> AGROVALLE</h4>

        <a href="{{ route('dashboard') }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <a href="{{ route('insumos.index') }}">
            <i class="bi bi-box-seam"></i> Insumos
        </a>

        <a href="#">
            <i class="bi bi-building"></i> Fabricantes
        </a>

        <a href="{{ route('proveedores.index') }}">
            <i class="bi bi-truck"></i> Proveedores
        </a>

        <a href="{{ route('empleados.index') }}">
            <i class="bi bi-people"></i> Recursos Humanos
        </a>
    </div>

    <div class="contenido">

        <div class="barra-superior d-flex justify-content-between align-items-center">
            <strong>Panel Administrativo</strong>

            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle"></i>
                    {{ Auth::user()->name }}
                </button>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            Mi perfil
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" type="submit">
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <main class="contenido-principal">
            @isset($header)
                <h3 class="mb-4">{{ $header }}</h3>
            @endisset

            {{ $slot }}
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
