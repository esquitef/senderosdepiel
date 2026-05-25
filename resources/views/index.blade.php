<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolsas Artesanales</title>

    <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
</head>

<!-- MODAL -->

<div id="modal" class="modal">

    <span class="cerrar" onclick="cerrarModal()">
        &times;
    </span>

    <img id="imagenModal" class="modal-contenido">

</div>

<script>

function abrirModal(src){

    document.getElementById('modal').style.display = 'flex';

    document.getElementById('imagenModal').src = src;

}

function cerrarModal(){

    document.getElementById('modal').style.display = 'none';

}

</script>

<body>

    <header class="header">

        <div class="menu container">

            <a href="#" class="logo-container">

<img src="{{ secure_asset('imagenes/logo.png') }}" class="logo-img">

    <span class="logo-text">
        Senderos de Piel
    </span>

</a>

            <input type="checkbox" id="menu"/>

            <label for="menu">
                <img src="{{ secure_asset('imagenes/menu.png') }}" class="menu-icono" alt="">
            </label>

            <nav class="navbar">

                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Productos</a></li>
                    @auth

<li>
    <a href="{{ url('/admin') }}">
        Panel Admin
    </a>
</li>

@else

<li>
    <a href="{{ route('login') }}">
        Admin
    </a>
</li>

@endauth
                </ul>

            </nav>

        </div>

        <div class="header-content container">

            <div class="header-txt">

                <h1>
                    Compra tu <span>bolsa</span><br>
                    preferida aquí
                </h1>

                <p>
                    Descubre nuestras bolsas artesanales hechas con dedicación y estilo único.
                </p>

                <div class="butons">

                    <a href="#productos" class="btn-1">
                        Productos
                    </a>

                    <a href="#contacto" class="btn-1">
                        Contacto
                    </a>

                </div>

            </div>

        </div>

    </header>

    <section class="popular container">

        <h2>Productos en tendencia</h2>

        <div class="popular-content">

    @foreach($bolsas->take(5) as $bolsa)

        <img src="{{ asset('storage/' . $bolsa->imagen) }}">

    @endforeach

</div>

    </section>

    <main class="product container" id="productos">

        <h2>Todos los productos</h2>

        <div class="product-content">

            @foreach ($bolsas as $bolsa)

                <div class="product-1">

                    <img
src="{{ asset('storage/' . $bolsa->imagen) }}"
alt=""
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

        </div>

    </section>

    <footer class="footer container">

        <div class="link">

            <a href="#" class="logo">Senderos de Piel</a>

        </div>

        <div class="link">

            <ul>

                <li><a href="#">Inicio</a></li>

            </ul>

        </div>

    </footer>

    <div id="modal" class="modal">

    <span class="cerrar" onclick="cerrarModal()">
        &times;
    </span>

    <img id="imagenModal" class="modal-contenido">

</div>
</body>
</html>