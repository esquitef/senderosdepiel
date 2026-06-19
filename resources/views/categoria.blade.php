<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $categoria }} - Senderos de Piel</title>
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

        nav ul li a:hover {
            color: violet;
        }

        /* HERO */
        .hero {
            text-align: center;
            padding: 70px 20px 50px;
        }

        .hero a {
            color: #a89bc2;
            font-size: 14px;
            display: inline-block;
            margin-bottom: 15px;
            transition: 0.3s;
        }

        .hero a:hover {
            color: violet;
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
            font-size: 15px;
        }

        /* PRODUCTOS */
        .products {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 40px 80px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 35px;
        }

        .product-card {
            background-color: #2A223A;
            border-radius: 25px;
            overflow: hidden;
            border: 2px solid #3f3456;
            transition: 0.3s;
        }

        .product-card:hover {
            border-color: violet;
            transform: translateY(-8px);
        }

        .product-card img {
            width: 100%;
            height: 280px;
            object-fit: contain;
            background-color: #1b1726;
            padding: 10px;
            cursor: pointer;
        }

        .product-info {
            padding: 25px;
        }

        .product-info h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-footer p {
            color: violet;
            font-size: 20px;
            font-weight: 700;
        }

        .btn-interes {
            display: inline-block;
            padding: 10px 20px;
            background-color: violet;
            color: white;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-interes:hover {
            background-color: #c800c8;
        }

        /* EMPTY */
        .empty {
            text-align: center;
            padding: 80px 20px;
            color: #a89bc2;
        }

        .empty p {
            font-size: 18px;
            margin-top: 15px;
        }

        /* MODAL */
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.9);
            justify-content: center;
            align-items: center;
        }

        .modal-contenido {
            width: 70%;
            max-width: 600px;
            border-radius: 20px;
            object-fit: contain;
            animation: zoom .3s;
        }

        .cerrar {
            position: absolute;
            top: 30px;
            right: 40px;
            font-size: 50px;
            color: white;
            cursor: pointer;
        }

        @keyframes zoom {
            from { transform: scale(.7); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        @media(max-width: 768px) {
            .product-grid {
                grid-template-columns: 1fr;
            }
            .header {
                padding: 15px 20px;
            }
            nav ul {
                gap: 15px;
            }
            .products {
                padding: 20px;
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
                <li><a href="{{ url('/secciones') }}">Colecciones</a></li>
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
        <a href="{{ url('/secciones') }}">← Volver a Colecciones</a>
        <h1><span>{{ $categoria }}</span></h1>
        <p>{{ $bolsas->count() }} producto(s) encontrado(s)</p>
    </div>

    <!-- PRODUCTOS -->
    <div class="products">
        @if($bolsas->count() > 0)
            <div class="product-grid">
                @foreach($bolsas as $bolsa)
                <div class="product-card">
                    <img
                        src="{{ $bolsa->imagen }}"
                        alt="{{ $bolsa->nombre }}"
                        onclick="abrirModal(this.src)"
                    >
                    <div class="product-info">
                        <h3>{{ $bolsa->nombre }}</h3>
                        <div class="product-footer">
                            <p>${{ $bolsa->precio }}</p>
                            <a
                                href="https://wa.me/5217222032942?text=Hola,%20me%20interesa%20la%20bolsa%20{{ urlencode($bolsa->nombre) }}"
                                class="btn-interes"
                                target="_blank"
                            >
                                Me interesa
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="empty">
                <p>👜 No hay productos en esta categoría aún.</p>
            </div>
        @endif
    </div>

    <!-- MODAL -->
    <div id="modal" class="modal">
        <span class="cerrar" onclick="cerrarModal()">&times;</span>
        <img id="imagenModal" class="modal-contenido">
    </div>

    <script>
        function abrirModal(src) {
            document.getElementById('modal').style.display = 'flex';
            document.getElementById('imagenModal').src = src;
        }
        function cerrarModal() {
            document.getElementById('modal').style.display = 'none';
        }
    </script>

</body>
</html>