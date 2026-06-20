<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sendero Económico</title>
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
            padding-bottom: 60px;
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

        .navbar h2 {
            font-size: 20px;
            font-weight: 700;
        }

        .navbar a {
            color: #a89bc2;
            font-size: 14px;
            transition: 0.3s;
            border: 2px solid #3f3456;
            padding: 8px 18px;
            border-radius: 10px;
        }

        .navbar a:hover {
            color: violet;
            border-color: violet;
        }

        .main {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .section-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #3f3456;
        }

        .section-title span {
            color: violet;
        }

        /* STATS GRID */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 50px;
        }

        .stat-card {
            background-color: #2A223A;
            border-radius: 20px;
            padding: 25px;
            border: 2px solid #3f3456;
            transition: 0.3s;
        }

        .stat-card:hover {
            border-color: violet;
            transform: translateY(-4px);
        }

        .stat-icon {
            font-size: 30px;
            margin-bottom: 12px;
        }

        .stat-label {
            color: #a89bc2;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 26px;
            font-weight: 700;
            color: white;
        }

        .stat-value.green { color: #74c69d; }
        .stat-value.violet { color: violet; }
        .stat-value.red { color: #ff6b8a; }
        .stat-value.blue { color: #74b9ff; }

        /* MES GRID */
        .mes-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 50px;
        }

        .mes-card {
            background: linear-gradient(135deg, #2A223A, #332645);
            border-radius: 20px;
            padding: 25px;
            border: 2px solid #3f3456;
        }

        .mes-card .label {
            color: #a89bc2;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .mes-card .value {
            font-size: 22px;
            font-weight: 700;
        }

        /* TABLA VENTAS */
        .tabla-container {
            background: #2A223A;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 18px 20px;
            text-align: center;
            background: #3f3456;
            font-size: 13px;
            color: #d1c8e8;
        }

        td {
            padding: 15px 20px;
            text-align: center;
            font-size: 14px;
            border-bottom: 1px solid #3f3456;
        }

        tbody tr:hover {
            background: #332645;
        }

        td img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }

        .badge {
            background: #3f3456;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            color: #a89bc2;
        }

        .precio { color: violet; font-weight: 700; }
        .fabrica { color: #74c69d; }
        .ganancia-pos { color: #74c69d; font-weight: 600; }
        .ganancia-neg { color: #ff6b8a; font-weight: 600; }

        .fecha {
            color: #a89bc2;
            font-size: 12px;
        }

        /* INVENTARIO */
        .inventario-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .inv-card {
            background: #2A223A;
            border-radius: 16px;
            overflow: hidden;
            border: 2px solid #3f3456;
            transition: 0.3s;
        }

        .inv-card:hover {
            border-color: #3f3456;
        }

        .inv-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .inv-info {
            padding: 15px;
        }

        .inv-info h4 {
            font-size: 14px;
            margin-bottom: 8px;
        }

        .inv-prices {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #a89bc2;
        }

        @media(max-width: 768px) {
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .mes-grid { grid-template-columns: 1fr; }
            .inventario-grid { grid-template-columns: repeat(2, 1fr); }
            .navbar { padding: 15px 20px; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <h2>📊 Sendero Económico</h2>
        <a href="{{ url('/admin') }}">← Volver al Panel</a>
    </nav>

    <div class="main">

        <!-- STATS GENERALES -->
        <h2 class="section-title">Resumen <span>General</span></h2>
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">💰</div>
                <div class="stat-label">Total Invertido (inventario)</div>
                <div class="stat-value red">${{ number_format($inversionActual, 2) }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🛍️</div>
                <div class="stat-label">Total Vendido (histórico)</div>
                <div class="stat-value blue">${{ number_format($totalVendido, 2) }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🏭</div>
                <div class="stat-label">Costo de lo Vendido</div>
                <div class="stat-value violet">${{ number_format($totalCostoVendido, 2) }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">📈</div>
                <div class="stat-label">Ganancia Total</div>
                <div class="stat-value {{ $gananciaTotal >= 0 ? 'green' : 'red' }}">
                    ${{ number_format($gananciaTotal, 2) }}
                </div>
            </div>
        </div>

        <!-- STATS DEL MES -->
        <h2 class="section-title">Este <span>Mes</span></h2>
        <div class="mes-grid">
            <div class="mes-card">
                <div class="label">💵 Ventas del mes</div>
                <div class="value blue">${{ number_format($ventasMes, 2) }}</div>
            </div>
            <div class="mes-card">
                <div class="label">📦 Bolsas en inventario</div>
                <div class="value violet">{{ $bolsas->count() }} piezas</div>
            </div>
            <div class="mes-card">
                <div class="label">✨ Ganancia del mes</div>
                <div class="value {{ $gananciasMes >= 0 ? 'green' : 'red' }}">${{ number_format($gananciasMes, 2) }}</div>
            </div>
        </div>

        <!-- HISTORIAL DE VENTAS -->
        <h2 class="section-title">Historial de <span>Ventas</span></h2>
        <div class="tabla-container">
            @if($ventas->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Precio Venta</th>
                        <th>Costo Fábrica</th>
                        <th>Ganancia</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ventas as $venta)
                    @php $ganancia = $venta->precio - $venta->valor_fabrica; @endphp
                    <tr>
                        <td><img src="{{ $venta->imagen }}" alt="{{ $venta->nombre }}"></td>
                        <td>{{ $venta->nombre }}</td>
                        <td><span class="badge">{{ $venta->categoria }}</span></td>
                        <td><span class="precio">${{ number_format($venta->precio, 2) }}</span></td>
                        <td><span class="fabrica">${{ number_format($venta->valor_fabrica, 2) }}</span></td>
                        <td>
                            <span class="{{ $ganancia >= 0 ? 'ganancia-pos' : 'ganancia-neg' }}">
                                ${{ number_format($ganancia, 2) }}
                            </span>
                        </td>
                        <td><span class="fecha">{{ $venta->created_at->format('d/m/Y') }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <div class="empty">
                    <p>📦 Aún no hay ventas registradas.</p>
                </div>
            @endif
        </div>

        <!-- INVENTARIO ACTUAL -->
        <h2 class="section-title">Inventario <span>Actual</span></h2>
        @if($bolsas->count() > 0)
        <div class="inventario-grid">
            @foreach($bolsas as $bolsa)
            <div class="inv-card">
                <img src="{{ $bolsa->imagen }}" alt="{{ $bolsa->nombre }}">
                <div class="inv-info">
                    <h4>{{ $bolsa->nombre }}</h4>
                    <div class="inv-prices">
                        <span class="fabrica">F: ${{ number_format($bolsa->valor_fabrica, 2) }}</span>
                        <span class="precio">V: ${{ number_format($bolsa->precio, 2) }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
            <div class="empty">
                <p>No hay bolsas en inventario.</p>
            </div>
        @endif

    </div>

</body>
</html>