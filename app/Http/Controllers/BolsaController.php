<?php

namespace App\Http\Controllers;

use App\Models\Bolsa;

class BolsaController extends Controller
{
    public function index()
    {
        $bolsas = Bolsa::all();
        return view('index', compact('bolsas'));
    }

    public function secciones()
    {
        $categorias = ['Crossbody', 'Carteras', 'Bolsa duo', 'Mochilas', 'Bolsas varias'];

        $previews = [];
        foreach ($categorias as $cat) {
            $bolsa = Bolsa::where('categoria', $cat)->inRandomOrder()->first();
            $previews[$cat] = $bolsa;
        }

        return view('secciones', compact('previews', 'categorias'));
    }

    public function categoria($categoria)
    {
        $bolsas = Bolsa::where('categoria', $categoria)->get();
        return view('categoria', compact('bolsas', 'categoria'));
    }
}