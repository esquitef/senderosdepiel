<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colecciones - Senderos de Piel</title>
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
            color: white;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* NAVBAR */
        .header {
            background-color: #2A223A;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
        }

        .logo-text {
            color: white;
            font-size: 18px;
            font-weight: 700;
        }

        nav ul {
            display: flex;
            gap: 30px;
        }

        nav ul li a {
            color: #a89bc2;
            font-size: 15px;
            font-weight: 500;
            transition: 0.3s;
        }

        nav ul li a:hover,
        nav ul li a.active {
            color: violet;
        }

        /* HERO */
        .hero {
            text-align: center;
            padding: 70px 20px 50px;
        }

        .hero h1 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .hero h1 span {
            color: violet;
        }

        .hero p {
            color: #a89bc2;
            font-size: 16px;
        }

        /* GRID CATEGORIAS */
        .categorias-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            padding: 20px 40px 80px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .categoria-card {
            background-color: #2A223A;
            border-radius: 25px;
            overflow: hidden;
            border: 2px solid #3f3456;
            transition: 0.3s;
            cursor: pointer;
        }

        .categoria-card:hover {
            border-color: violet;
            transform: translateY(-8px);
        }

        .categoria-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .categoria-sin-img {
            width: 100%;
            height: 250px;
            background: linear-gradient(135deg, #3f3456, #2A223A);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 60px;
        }

        .categoria-info {
            padding: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .categoria-info h3 {
            font-size: 20px;
            font-weight: 600;
        }

        .categoria-info span {
            color: violet;
            font-size: 22px;
        }

        @media(max-width: 768px) {
            .categorias-grid {
                grid-template-columns: 1fr;
                padding: 20px;
            }

            .header {
                padding: 15px 20px;
            }

            nav ul {
                gap: 15px;
            }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <header class="header">
        <a href="/" class="logo-container">
            <img src="{{ secure_asset('imagenes/logo.png') }}" class="logo-img">
            <span class="logo-text">Senderos de Piel</span>
        </a>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Productos</a></li>
                <li><a href="{{ url('/secciones') }}" class="active">Colecciones</a></li>
                @auth
                    <li><a href="{{ url('/admin') }}">Panel Admin</a></li>
                @else
                    <li><a href="{{ route('login') }}">Admin</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <!-- HERO -->
    <div class="hero">
        <h1>Nuestras <span>Colecciones</span></h1>
        <p>Explora cada categoría y encuentra la bolsa perfecta para ti</p>
    </div>

    <!-- GRID -->
    <div class="categorias-grid">
        @foreach($categorias as $cat)
        <a href="{{ url('/secciones/' . urlencode($cat)) }}" class="categoria-card">

            @if($previews[$cat])
                <img src="{{ $previews[$cat]->imagen }}" alt="{{ $cat }}">
            @else
                <div class="categoria-sin-img">👜</div>
            @endif

            <div class="categoria-info">
                <h3>{{ $cat }}</h3>
                <span>→</span>
            </div>

        </a>
        @endforeach
    </div>

</body>
</html>