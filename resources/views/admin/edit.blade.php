<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Bolsa - Senderos de Piel</title>
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
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .card {
            background-color: #2A223A;
            border-radius: 25px;
            padding: 50px 45px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 35px;
        }

        .card-header a {
            color: #a89bc2;
            font-size: 22px;
            transition: 0.3s;
        }

        .card-header a:hover {
            color: violet;
        }

        .card-header h1 {
            color: white;
            font-size: 24px;
            font-weight: 700;
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

        input[type="text"],
        input[type="number"],
        textarea {
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

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            border-color: violet;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .imagen-actual {
            margin-bottom: 12px;
        }

        .imagen-actual img {
            width: 100%;
            max-height: 200px;
            object-fit: contain;
            border-radius: 12px;
            background-color: #1b1726;
            padding: 10px;
        }

        .imagen-actual p {
            color: #a89bc2;
            font-size: 12px;
            margin-bottom: 8px;
        }

        .file-input-wrapper {
            position: relative;
        }

        input[type="file"] {
            width: 100%;
            padding: 12px 18px;
            background-color: #1b1726;
            border: 2px dashed #3f3456;
            border-radius: 12px;
            color: #a89bc2;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            cursor: pointer;
            transition: border-color 0.3s;
        }

        input[type="file"]:hover {
            border-color: violet;
        }

        .btn-submit {
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
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #c800c8;
            transform: translateY(-2px);
        }

        ::placeholder {
            color: #6b5f80;
        }
    </style>
</head>
<body>

    <div class="card">

        <div class="card-header">
            <a href="{{ url('/admin') }}">&#8592;</a>
            <h1>Editar Bolsa</h1>
        </div>

        <form
            action="{{ route('bolsas.update', $bolsa->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nombre</label>
                <input
                    type="text"
                    name="nombre"
                    value="{{ $bolsa->nombre }}"
                    placeholder="Nombre de la bolsa"
                    required
                >
            </div>

            <div class="form-group">
                <label>Precio</label>
                <input
                    type="number"
                    name="precio"
                    value="{{ $bolsa->precio }}"
                    placeholder="0.00"
                    required
                >
            </div>

            <div class="form-group">
                <label>Descripción</label>
                <textarea
                    name="descripcion"
                    placeholder="Descripción de la bolsa"
                >{{ $bolsa->descripcion }}</textarea>
            </div>

            <div class="form-group">
                <label>Imagen actual</label>
                <div class="imagen-actual">
                    <img src="{{ $bolsa->imagen }}" alt="{{ $bolsa->nombre }}">
                    <p>Sube una nueva imagen solo si deseas cambiarla</p>
                </div>
                <div class="file-input-wrapper">
                    <input type="file" name="imagen" accept="image/*">
                </div>
            </div>

            <button type="submit" class="btn-submit">
                Actualizar Bolsa
            </button>

        </form>

    </div>

</body>
</html>