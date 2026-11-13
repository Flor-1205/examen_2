<x-guest-layout>
    <style>
        body {
            background: #edf4ed !important;
        }

        .min-h-screen:has(.agro-register) {
            background: linear-gradient(135deg, #e7f1e7, #f7faf6) !important;
            justify-content: center;
        }

        .min-h-screen:has(.agro-register) > div:first-child {
            display: none;
        }

        .min-h-screen:has(.agro-register) > div:last-child {
            background: transparent !important;
            box-shadow: none !important;
            padding: 0 !important;
            width: 100% !important;
            max-width: 460px !important;
        }

        .agro-register {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 15px 45px rgba(30, 75, 45, .13);
            border-top: 6px solid #267345;
        }

        .agro-logo {
            width: 62px;
            height: 62px;
            background: #e8f4eb;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 13px;
            font-size: 32px;
        }

        .agro-register h1 {
            color: #245b38;
            font-size: 25px;
            font-weight: 800;
            text-align: center;
        }

        .agro-subtitle {
            color: #78877b;
            text-align: center;
            font-size: 13px;
            margin-bottom: 27px;
        }

        .agro-field {
            margin-bottom: 17px;
        }

        .agro-field label {
            display: block;
            color: #344b3a;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .agro-field input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #dce6dd;
            border-radius: 10px;
            background: #f9fbf9;
            font-size: 14px;
        }

        .agro-field input:focus {
            border-color: #368454;
            outline: none;
            box-shadow: 0 0 0 3px rgba(54, 132, 84, .12);
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
            margin-top: 8px;
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
            margin-top: 23px;
        }

        .agro-login-link {
            color: #267345;
            font-weight: 700;
            text-decoration: none;
        }

        @media(max-width: 480px) {
            .agro-register {
                padding: 27px 22px;
            }
        }
    </style>

    <div class="agro-register">

        <div class="agro-logo">🌿</div>

        <h1>AGROVALLE</h1>
        <p class="agro-subtitle">
            HONDURAS · Crear una cuenta
        </p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="agro-field">
                <label for="name">Nombre completo</label>
                <input id="name" type="text" name="name"
                    value="{{ old('name') }}"
                    placeholder="Ingrese su nombre"
                    required autofocus autocomplete="name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="agro-field">
                <label for="email">Correo electrónico</label>
                <input id="email" type="email" name="email"
                    value="{{ old('email') }}"
                    placeholder="Ingrese su correo"
                    required autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="agro-field">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password"
                    placeholder="Cree una contraseña"
                    required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="agro-field">
                <label for="password_confirmation">Confirmar contraseña</label>
                <input id="password_confirmation" type="password"
                    name="password_confirmation"
                    placeholder="Repita su contraseña"
                    required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <button type="submit" class="agro-button">
                Crear cuenta
            </button>
        </form>

        <div class="text-center mt-4 text-sm text-gray-600">
            ¿Ya tienes una cuenta?
            <a href="{{ route('login') }}" class="agro-login-link">
                Iniciar sesión
            </a>
        </div>

        <div class="agro-footer">
            © {{ date('Y') }} AGROVALLE HONDURAS. Todos los derechos reservados.
        </div>

    </div>
</x-guest-layout>
