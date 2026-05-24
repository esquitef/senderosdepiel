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
}