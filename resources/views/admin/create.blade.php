<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Bolsa</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>

        body{
            background: #1b1726;
            font-family: Poppins;
            color: white;
        }

        .container-admin{
            width: 500px;
            margin: 50px auto;
            background: #2A223A;
            padding: 40px;
            border-radius: 20px;
        }

        h1{
            text-align: center;
            margin-bottom: 30px;
        }

        .input-group{
            margin-bottom: 20px;
        }

        label{
            display: block;
            margin-bottom: 10px;
        }

        input, textarea{
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            background: #3f3456;
            color: white;
            font-size: 16px;
        }

        textarea{
            resize: none;
            height: 120px;
        }

        button{
            width: 100%;
            padding: 15px;
            background: purple;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 17px;
            cursor: pointer;
            transition: .3s;
        }

        button:hover{
            background: violet;
        }

        .volver{
            display: inline-block;
            margin-top: 20px;
            color: violet;
        }

    </style>

</head>
<body>

    <div class="container-admin">

        <h1>Agregar Nueva Bolsa</h1>

        <form
        action="{{ route('bolsas.store') }}"
        method="POST"
        enctype="multipart/form-data"
        >

            @csrf

            <div class="input-group">

                <label>Nombre</label>

                <input
                type="text"
                name="nombre"
                required>

            </div>

            <div class="input-group">

                <label>Precio</label>

                <input
                type="number"
                name="precio"
                required>

            </div>

            <div class="input-group">

                <label>Descripción</label>

                <textarea
                name="descripcion"></textarea>

            </div>

            <div class="input-group">

    <label>Categoría</label>

    <select name="categoria" required style="width:100%; padding:15px; border:none; border-radius:10px; background:#3f3456; color:white; font-size:16px;">
        <option value="Crossbody">Crossbody</option>
        <option value="Carteras">Carteras</option>
        <option value="Bolsa duo">Bolsa duo</option>
        <option value="Mochilas">Mochilas</option>
        <option value="Bolsas varias">Bolsas varias</option>
    </select>

</div>

            <div class="input-group">

                <label>Imagen</label>

                <input
                type="file"
                name="imagen"
                required>

            </div>

            <button type="submit">
                Guardar Bolsa
            </button>

        </form>

        <a href="/admin" class="volver">
            ← Volver al panel
        </a>

    </div>

</body>
</html>