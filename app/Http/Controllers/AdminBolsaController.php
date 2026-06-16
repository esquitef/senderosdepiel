<?php

namespace App\Http\Controllers;

use App\Models\Bolsa;
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
            'nombre'      => $request->nombre,
            'precio'      => $request->precio,
            'descripcion' => $request->descripcion,
            'imagen'      => $resultado['secure_url'],
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

        $bolsa->nombre      = $request->nombre;
        $bolsa->precio      = $request->precio;
        $bolsa->descripcion = $request->descripcion;
        $bolsa->save();

        return redirect('/admin');
    }
}