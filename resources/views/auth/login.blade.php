<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Senderos de Piel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #1b1726;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background-color: #2A223A;
            border-radius: 25px;
            padding: 50px 45px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        }

        .login-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .login-header a {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .login-header img {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            object-fit: cover;
        }

        .login-header span {
            color: white;
            font-size: 18px;
            font-weight: 700;
        }

        .login-header h1 {
            color: white;
            font-size: 26px;
            font-weight: 700;
        }

        .login-header p {
            color: #a89bc2;
            font-size: 14px;
            margin-top: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #d1c8e8;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px 18px;
            background-color: #1b1726;
            border: 2px solid #3f3456;
            border-radius: 12px;
            color: white;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            outline: none;
            transition: border-color 0.3s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: violet;
        }

        ::placeholder {
            color: #6b5f80;
        }

        .error-msg {
            color: #ff6b8a;
            font-size: 12px;
            margin-top: 5px;
        }

        .remember-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 25px;
        }

        input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: violet;
            cursor: pointer;
        }

        .remember-row span {
            color: #a89bc2;
            font-size: 13px;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background-color: violet;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: 0.3s;
            letter-spacing: 0.5px;
        }

        .btn-login:hover {
            background-color: #c800c8;
            transform: translateY(-2px);
        }

        .login-footer {
            text-align: center;
            margin-top: 25px;
        }

        .login-footer a {
            color: violet;
            font-size: 13px;
            transition: 0.3s;
        }

        .login-footer a:hover {
            color: #c800c8;
        }

        .status-msg {
            background-color: #1b3a2a;
            border: 1px solid #2d6a4f;
            color: #74c69d;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="login-container">

        <div class="login-header">
            <a href="/">
                <img src="{{ secure_asset('imagenes/logo.png') }}" alt="Logo">
                <span>Senderos de Piel</span>
            </a>
            <h1>Bienvenido</h1>
            <p>Inicia sesión en tu cuenta</p>
        </div>

        @if (session('status'))
            <div class="status-msg">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="tucorreo@ejemplo.com"
                    required
                    autofocus
                    autocomplete="username"
                >
                @error('email')
                    <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    required
                    autocomplete="current-password"
                >
                @error('password')
                    <p class="error-msg">{{ $message }}</p>
                @enderror
            </div>

            <div class="remember-row">
                <input id="remember_me" type="checkbox" name="remember">
                <span>Recordarme</span>
            </div>

            <button type="submit" class="btn-login">
                Iniciar sesión
            </button>

        </form>

        <div class="login-footer">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
            @endif
        </div>

    </div>

</body>
</html>