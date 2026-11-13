<x-guest-layout>
    <style>
        body {
            background: #edf4ed !important;
        }

        .min-h-screen:has(.agro-login) {
            background: linear-gradient(135deg, #e7f1e7, #f7faf6) !important;
            justify-content: center;
        }

        .min-h-screen:has(.agro-login) > div:first-child {
            display: none;
        }

        .min-h-screen:has(.agro-login) > div:last-child {
            background: transparent !important;
            box-shadow: none !important;
            padding: 0 !important;
            width: 100% !important;
            max-width: 460px !important;
            overflow: visible !important;
        }

        .agro-login {
            background: white;
            border-radius: 20px;
            padding: 38px;
            box-shadow: 0 15px 45px rgba(30, 75, 45, 0.13);
            border-top: 6px solid #267345;
        }

        .agro-logo {
            width: 65px;
            height: 65px;
            background: #e8f4eb;
            color: #267345;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 30px;
        }

        .agro-login h1 {
            color: #245b38;
            font-size: 25px;
            font-weight: 800;
            text-align: center;
            margin: 0;
        }

        .agro-subtitle {
            color: #78877b;
            text-align: center;
            font-size: 13px;
            margin: 8px 0 30px;
        }

        .agro-login label {
            display: block;
            color: #344b3a;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .agro-login input[type="email"],
        .agro-login input[type="password"] {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #dce6dd;
            border-radius: 10px;
            background: #f9fbf9;
            font-size: 14px;
            outline: none;
            transition: .2s;
        }

        .agro-login input:focus {
            border-color: #368454;
            box-shadow: 0 0 0 3px rgba(54, 132, 84, .12);
        }

        .agro-field {
            margin-bottom: 20px;
        }

        .agro-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin: 8px 0 24px;
            font-size: 12px;
        }

        .agro-options label {
            display: flex;
            align-items: center;
            gap: 7px;
            margin: 0;
            font-weight: 400;
        }

        .agro-options input {
            accent-color: #267345;
        }

        .agro-options a {
            color: #267345;
            text-decoration: none;
        }

        .agro-options a:hover {
            text-decoration: underline;
        }

        .agro-button {
            width: 100%;
            background: #267345;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 13px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        .agro-button:hover {
            background: #1d5935;
            transform: translateY(-1px);
        }

        .agro-footer {
            text-align: center;
            color: #91a095;
            font-size: 11px;
            margin-top: 25px;
        }

        @media(max-width: 480px) {
            .agro-login {
                padding: 28px 22px;
            }
        }
    </style>

    <div class="agro-login">

        <div class="agro-logo">
            <span style="font-size: 34px;">🌼</span>
        </div>

        <h1>AGROVALLE</h1>
        <p class="agro-subtitle">
            HONDURAS · Sistema Administrativo
        </p>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="agro-field">
                <label for="email">Correo electrónico</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Ingrese su correo electrónico"
                    required
                    autofocus
                    autocomplete="username"
                >
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="agro-field">
                <label for="password">Contraseña</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Ingrese su contraseña"
                    required
                    autocomplete="current-password"
                >
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="agro-options">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    Recordarme
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif
            </div>

            <button type="submit" class="agro-button">
                <i class="bi bi-box-arrow-in-right me-2"></i>
                Iniciar sesión
            </button>
        </form>
        <div class="text-center mt-4">
            <span class="text-sm text-gray-600">
                ¿No tienes una cuenta?
            </span>

            <a href="{{ route('register') }}"
            class="text-sm font-semibold"
            style="color: #267345;">
                Registrarse
            </a>
        </div>

        <div class="agro-footer">
            © {{ date('Y') }} AGROVALLE HONDURAS. Todos los derechos reservados.
        </div>

    </div>
</x-guest-layout>
