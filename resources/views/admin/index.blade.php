<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin</title>
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
            background: #1b1726;
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .admin-container {
            width: 90%;
            margin: 50px auto;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .top h1 {
            font-size: 28px;
            font-weight: 700;
        }

        .top-buttons {
            display: flex;
            gap: 12px;
        }

        .btn {
            background: purple;
            padding: 12px 20px;
            border-radius: 10px;
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn:hover {
            background: violet;
        }

        .btn-economia {
            background: #1b3a2a;
            border: 2px solid #2d6a4f;
            color: #74c69d;
            padding: 12px 20px;
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-economia:hover {
            background: #2d6a4f;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #2A223A;
            border-radius: 20px;
            overflow: hidden;
        }

        th {
            padding: 20px;
            text-align: center;
            background: #3f3456;
            font-size: 14px;
            color: #d1c8e8;
        }

        td {
            padding: 15px 20px;
            text-align: center;
            font-size: 14px;
        }

        img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
        }

        tr {
            border-bottom: 1px solid #3f3456;
            transition: 0.2s;
        }

        tbody tr:hover {
            background: #332645;
        }

        .categoria-badge {
            background: #3f3456;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            color: #a89bc2;
        }

        .precio {
            color: violet;
            font-weight: 700;
            font-size: 16px;
        }

        .fabrica {
            color: #74c69d;
            font-size: 13px;
        }

        .edit {
            background: royalblue;
            padding: 8px 14px;
            border-radius: 8px;
            color: white;
            font-size: 13px;
            transition: 0.3s;
        }

        .edit:hover {
            background: #2855c7;
        }

        .delete, .vender {
            padding: 8px 14px;
            border-radius: 8px;
            color: white;
            border: none;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            transition: 0.3s;
        }

        .delete {
            background: crimson;
        }

        .delete:hover {
            background: #a00020;
        }

        .vender {
            background: #2d6a4f;
        }

        .vender:hover {
            background: #40916c;
        }

        .acciones {
            display: flex;
            gap: 8px;
            justify-content: center;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>

    <div class="admin-container">

        <div class="top">
            <h1>Panel de Bolsas</h1>
            <div class="top-buttons">
                <a href="{{ route('economia') }}" class="btn-economia">📊 Sendero Económico</a>
                <a href="{{ url('/admin/crear') }}" class="btn">+ Nueva Bolsa</a>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Costo Fábrica</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bolsas as $bolsa)
                <tr>
                    <td><img src="{{ $bolsa->imagen }}" alt="{{ $bolsa->nombre }}"></td>
                    <td>{{ $bolsa->nombre }}</td>
                    <td><span class="categoria-badge">{{ $bolsa->categoria }}</span></td>
                    <td><span class="precio">${{ $bolsa->precio }}</span></td>
                    <td><span class="fabrica">${{ $bolsa->valor_fabrica }}</span></td>
                    <td>
                        <div class="acciones">

                            <a href="{{ route('bolsas.edit', $bolsa->id) }}" class="edit">
                                Editar
                            </a>

                            <form action="{{ route('bolsas.destroy', $bolsa->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete" onclick="return confirm('¿Eliminar esta bolsa?')">
                                    Eliminar
                                </button>
                            </form>

                            <form action="{{ route('bolsas.vender', $bolsa->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="vender" onclick="return confirm('¿Marcar como vendida?')">
                                    ✓ Vendido
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>
</html>