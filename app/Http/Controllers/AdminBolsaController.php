<?php

namespace App\Http\Controllers;

use App\Models\Bolsa;
use Illuminate\Http\Request;

class AdminBolsaController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $rutaImagen = $request->file('imagen')
        ->store('bolsas', 'public');

        Bolsa::create([

            'nombre' => $request->nombre,

            'precio' => $request->precio,

            'descripcion' => $request->descripcion,

            'imagen' => $rutaImagen

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
    if($request->hasFile('imagen')){

        $rutaImagen = $request->file('imagen')
        ->store('bolsas', 'public');

        $bolsa->imagen = $rutaImagen;
    }

    $bolsa->nombre = $request->nombre;

    $bolsa->precio = $request->precio;

    $bolsa->descripcion = $request->descripcion;

    $bolsa->save();

    return redirect('/admin');
}
}