<?php

namespace App\Http\Controllers;

use App\Models\Bolsa;
use App\Models\Venta;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class AdminBolsaController extends Controller
{
    private function cloudinary()
    {
        return new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ]
        ]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $cloudinary = $this->cloudinary();

        $resultado = $cloudinary->uploadApi()->upload(
            $request->file('imagen')->getRealPath(),
            ['folder' => 'bolsas']
        );

        Bolsa::create([
            'nombre'        => $request->nombre,
            'precio'        => $request->precio,
            'valor_fabrica' => $request->valor_fabrica,
            'descripcion'   => $request->descripcion,
            'categoria'     => $request->categoria,
            'imagen'        => $resultado['secure_url'],
        ]);

        return redirect('/');
    }

    public function index()
    {
        $bolsas = Bolsa::all();
        return view('admin.index', compact('bolsas'));
    }

    public function destroy(Bolsa $bolsa)
    {
        $bolsa->delete();
        return redirect('/admin');
    }

    public function vender(Bolsa $bolsa)
    {
        Venta::create([
            'nombre'        => $bolsa->nombre,
            'categoria'     => $bolsa->categoria,
            'precio'        => $bolsa->precio,
            'valor_fabrica' => $bolsa->valor_fabrica,
            'imagen'        => $bolsa->imagen,
        ]);

        $bolsa->delete();

        return redirect('/admin');
    }

    public function edit(Bolsa $bolsa)
    {
        return view('admin.edit', compact('bolsa'));
    }

    public function update(Request $request, Bolsa $bolsa)
    {
        if ($request->hasFile('imagen')) {
            $cloudinary = $this->cloudinary();
            $resultado = $cloudinary->uploadApi()->upload(
                $request->file('imagen')->getRealPath(),
                ['folder' => 'bolsas']
            );
            $bolsa->imagen = $resultado['secure_url'];
        }

        $bolsa->nombre        = $request->nombre;
        $bolsa->precio        = $request->precio;
        $bolsa->valor_fabrica = $request->valor_fabrica;
        $bolsa->descripcion   = $request->descripcion;
        $bolsa->categoria     = $request->categoria;
        $bolsa->save();

        return redirect('/admin');
    }

    public function economia()
{
    $ventas = Venta::orderBy('created_at', 'desc')->get();
    $bolsas = Bolsa::all();

    $totalInvertido     = $bolsas->sum('valor_fabrica');
    $totalVendido       = $ventas->sum('precio');
    $totalCostoVendido  = $ventas->sum('valor_fabrica');
    $gananciaTotal      = $totalVendido - $totalCostoVendido;
    $inversionActual    = $bolsas->sum('valor_fabrica');
    $ventasMes          = $ventas->where('created_at', '>=', now()->startOfMonth())->sum('precio');
    $gananciasMes       = $ventas->where('created_at', '>=', now()->startOfMonth())
                            ->sum(fn($v) => $v->precio - $v->valor_fabrica);

    return view('admin.economia', compact(
        'ventas', 'bolsas',
        'totalInvertido', 'totalVendido',
        'totalCostoVendido', 'gananciaTotal',
        'inversionActual', 'ventasMes', 'gananciasMes'
    ));
}
}