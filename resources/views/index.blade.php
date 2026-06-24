<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolsas Artesanales</title>
    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
</head>
<body>

    <header class="header">

        <div class="menu container">

            <a href="#" class="logo-container">
                <img src="{{ secure_asset('imagenes/logo.png') }}" class="logo-img">
                <span class="logo-text">Senderos de Piel</span>
            </a>

            <input type="checkbox" id="menu"/>

            <label for="menu">
                <img src="{{ secure_asset('imagenes/menu.png') }}" class="menu-icono" alt="">
            </label>

            <nav class="navbar">
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

        </div>

        <div class="header-content container">
            <div class="header-txt">
                <h1>Compra tu <span>bolsa</span><br>preferida aquí</h1>
                <p>Descubre nuestras bolsas artesanales hechas con dedicación y estilo único.</p>
                <div class="butons">
                    <a href="#productos" class="btn-1">Productos</a>
                    <a href="#contacto" class="btn-1">Contacto</a>
                </div>
            </div>
        </div>

    </header>

    <section class="popular container">
        <h2>Productos en tendencia</h2>
        <div class="popular-content">
            @foreach($bolsas->take(5) as $bolsa)
                <img src="{{ $bolsa->imagen }}" onclick="abrirModal(this.src)" style="cursor:pointer;">
            @endforeach
        </div>
    </section>

    <main class="product container" id="productos">
        <h2>Todos los productos</h2>
        <div class="product-content">
            @foreach ($bolsas as $bolsa)
                <div class="product-1">
                    <img
                        src="{{ $bolsa->imagen }}"
                        alt="{{ $bolsa->nombre }}"
                        onclick="abrirModal(this.src)"
                    >
                    <div class="product-txt">
                        <h3>{{ $bolsa->nombre }}</h3>
                        <div class="price">
                            <p>${{ $bolsa->precio }}</p>
                            <a
                                href="https://wa.me/5217222032942?text=Hola,%20me%20interesa%20la%20bolsa%20{{ urlencode($bolsa->nombre) }}"
                                class="btn-2"
                                target="_blank"
                            >
                                Me interesa
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <section class="contact container" id="contacto">
        <div class="contact-content">
            <h2>Bolsas de piel 100% artesanales</h2>
            <p style="color:#a89bc2; margin-top:15px; font-size:15px; line-height:1.7;">
                Cada bolsa es una obra de arte hecha a mano con piel de alta calidad.<br>
                Diseños únicos que combinan tradición y estilo moderno.
            </p>
            <div style="margin-top:30px; display:flex; gap:15px; justify-content:center; flex-wrap:wrap;">
                <a href="#productos" style="display:inline-block; padding:12px 30px; border-radius:30px; border:2px solid violet; color:white; transition:0.3s; font-weight:500;">Ver productos</a>
                <a href="https://wa.me/5217222032942" target="_blank" style="display:inline-block; padding:12px 30px; border-radius:30px; background:violet; color:white; font-weight:500; transition:0.3s;">Contáctanos</a>
            </div>
        </div>
    </section>

    <footer class="footer container" style="flex-direction:column; gap:25px; text-align:center; padding:50px 20px;">

        <a href="{{ url('/') }}" style="display:flex; align-items:center; gap:10px; justify-content:center;">
            <img src="{{ secure_asset('imagenes/logo.png') }}" style="width:50px; height:50px; border-radius:50%; object-fit:cover;">
            <span style="color:white; font-size:18px; font-weight:700;">Senderos de Piel</span>
        </a>

        <ul style="display:flex; gap:30px; justify-content:center; flex-wrap:wrap;">
            <li><a href="{{ url('/') }}" style="color:#a89bc2; transition:0.3s;" onmouseover="this.style.color='violet'" onmouseout="this.style.color='#a89bc2'">Productos</a></li>
            <li><a href="{{ url('/secciones') }}" style="color:#a89bc2; transition:0.3s;" onmouseover="this.style.color='violet'" onmouseout="this.style.color='#a89bc2'">Colecciones</a></li>
            <li><a href="#contacto" style="color:#a89bc2; transition:0.3s;" onmouseover="this.style.color='violet'" onmouseout="this.style.color='#a89bc2'">Contacto</a></li>
        </ul>

        <a href="https://www.facebook.com/share/1Cw6ZofFVu/" target="_blank"
            style="display:inline-flex; align-items:center; gap:10px; background:#1877F2; padding:12px 25px; border-radius:12px; color:white; font-weight:600; font-size:15px; transition:0.3s;"
            onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="white">
                <path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.792-4.697 4.533-4.697 1.312 0 2.686.236 2.686.236v2.97h-1.513c-1.491 0-1.956.93-1.956 1.874v2.25h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/>
            </svg>
            Senderos de Piel
        </a>

        <p style="color:#4a3f5c; font-size:13px;">© 2025 Senderos de Piel. Todos los derechos reservados.</p>

    </footer>

    <!-- MODAL (solo uno, al final del body) -->
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

        document.getElementById('modal').addEventListener('click', function(e) {
            if (e.target === this) cerrarModal();
        });
    </script>

</body>
</html>