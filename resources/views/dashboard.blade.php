<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Senderos de Piel</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            list-style: none;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #1b1726;
            min-height: 100vh;
            color: white;
        }

        /* NAVBAR */
        .navbar {
            background-color: #2A223A;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
        }

        .navbar-brand span {
            font-size: 18px;
            font-weight: 700;
            color: white;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .navbar-right span {
            color: #a89bc2;
            font-size: 14px;
        }

        .btn-logout {
            background: transparent;
            border: 2px solid #3f3456;
            color: #a89bc2;
            padding: 8px 18px;
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-logout:hover {
            border-color: violet;
            color: violet;
        }

        /* MAIN */
        .main {
            max-width: 1100px;
            margin: 60px auto;
            padding: 0 20px;
        }

        .welcome {
            margin-bottom: 50px;
        }

        .welcome h1 {
            font-size: 36px;
            font-weight: 700;
        }

        .welcome h1 span {
            color: violet;
        }

        .welcome p {
            color: #a89bc2;
            margin-top: 8px;
            font-size: 15px;
        }

        /* CARDS */
        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 40px;
        }

        .card {
            background-color: #2A223A;
            border-radius: 20px;
            padding: 30px;
            border: 2px solid #3f3456;
            transition: 0.3s;
        }

        .card:hover {
            border-color: violet;
            transform: translateY(-5px);
        }

        .card-icon {
            font-size: 36px;
            margin-bottom: 15px;
        }

        .card h3 {
            font-size: 16px;
            font-weight: 600;
            color: white;
            margin-bottom: 5px;
        }

        .card p {
            font-size: 13px;
            color: #a89bc2;
            line-height: 1.5;
        }

        /* BOTONES PRINCIPALES */
        .actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .btn-action {
            display: flex;
            align-items: center;
            gap: 15px;
            background-color: #2A223A;
            border: 2px solid #3f3456;
            border-radius: 18px;
            padding: 25px 30px;
            color: white;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
        }

        .btn-action:hover {
            border-color: violet;
            background-color: #332645;
            transform: translateY(-3px);
        }

        .btn-action .icon {
            font-size: 32px;
            background-color: #1b1726;
            padding: 12px;
            border-radius: 12px;
        }

        .btn-action .text h4 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 3px;
        }

        .btn-action .text p {
            font-size: 12px;
            color: #a89bc2;
        }

        .btn-primary {
            border-color: violet !important;
            background: linear-gradient(135deg, #2A223A, #3d2a5a) !important;
        }

        @media(max-width: 768px) {
            .cards {
                grid-template-columns: 1fr;
            }
            .actions {
                grid-template-columns: 1fr;
            }
            .navbar {
                padding: 15px 20px;
            }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="/" class="navbar-brand">
            <img src="{{ secure_asset('imagenes/logo.png') }}" alt="Logo">
            <span>Senderos de Piel</span>
        </a>
        <div class="navbar-right">
            <span>{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">Cerrar sesión</button>
            </form>
        </div>
    </nav>

    <!-- MAIN -->
    <div class="main">

        <div class="welcome">
            <h1>Hola, <span>{{ Auth::user()->name }}</span> 👋</h1>
            <p>Bienvenido a tu panel de control de Senderos de Piel.</p>
        </div>

        <!-- CARDS INFO -->
        <div class="cards">
            <div class="card">
                <div class="card-icon">👜</div>
                <h3>Gestión de Bolsas</h3>
                <p>Agrega, edita o elimina productos de tu catálogo fácilmente.</p>
            </div>
            <div class="card">
                <div class="card-icon">☁️</div>
                <h3>Imágenes en la Nube</h3>
                <p>Tus imágenes se guardan en Cloudinary de forma permanente.</p>
            </div>
            <div class="card">
                <div class="card-icon">🌐</div>
                <h3>Tienda en Línea</h3>
                <p>Tu catálogo está disponible para clientes en todo momento.</p>
            </div>
        </div>

        <!-- ACCIONES -->
        <div class="actions">
            <a href="{{ url('/admin') }}" class="btn-action btn-primary">
                <span class="icon">🛠️</span>
                <div class="text">
                    <h4>Panel Admin</h4>
                    <p>Administra todas tus bolsas</p>
                </div>
            </a>

            <a href="{{ url('/admin/crear') }}" class="btn-action">
                <span class="icon">➕</span>
                <div class="text">
                    <h4>Nueva Bolsa</h4>
                    <p>Agrega un nuevo producto al catálogo</p>
                </div>
            </a>

            <a href="{{ url('/') }}" class="btn-action">
                <span class="icon">🏪</span>
                <div class="text">
                    <h4>Ver Tienda</h4>
                    <p>Mira cómo ven tu tienda los clientes</p>
                </div>
            </a>

            <a href="{{ url('/profile') }}" class="btn-action">
                <span class="icon">👤</span>
                <div class="text">
                    <h4>Mi Perfil</h4>
                    <p>Edita tu información personal</p>
                </div>
            </a>
        </div>

    </div>

</body>
</html>