<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>

        body{
            background: #1b1726;
            color: white;
            font-family: Poppins;
        }

        .admin-container{
            width: 90%;
            margin: 50px auto;
        }

        .top{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .btn{
            background: purple;
            padding: 12px 20px;
            border-radius: 10px;
            color: white;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            background: #2A223A;
            border-radius: 20px;
            overflow: hidden;
        }

        th, td{
            padding: 20px;
            text-align: center;
        }

        img{
            width: 100px;
            border-radius: 10px;
        }

        tr{
            border-bottom: 1px solid #444;
        }

        .edit{
            background: royalblue;
            padding: 8px 15px;
            border-radius: 10px;
            color: white;
        }

        .delete{
            background: crimson;
            padding: 8px 15px;
            border-radius: 10px;
            color: white;
            border: none;
            cursor: pointer;
        }

    </style>

</head>
<body>

    <div class="admin-container">

        <div class="top">

            <h1>Panel de Bolsas</h1>

            <a href="{{ url('/admin/crear') }}" class="btn">
                + Nueva Bolsa
            </a>

        </div>

        <table>

            <thead>

                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

                @foreach($bolsas as $bolsa)

                <tr>

                    <td>
                        <img src="{{ asset('storage/' . $bolsa->imagen) }}">
                    </td>

                    <td>{{ $bolsa->nombre }}</td>

                    <td>${{ $bolsa->precio }}</td>

                    <td>

                        <a href="{{ route('bolsas.edit', $bolsa->id) }}"
                        class="edit">
                            Editar
                        </a>

                        <form
                        action="{{ route('bolsas.destroy', $bolsa->id) }}"
                        method="POST"
                        style="display:inline-block;"
                        >

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="delete">
                                Eliminar
                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</body>
</html>