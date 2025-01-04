<?php

namespace App\Http\Controllers;

use App\Models\comanda;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComandaController extends Controller
{
    public function index()
    {
        $usuari = auth()->user();

        $comandes = Comanda::where('usuari_id', $usuari->id)
            ->with('productes')
            ->with('pagament')
            ->get();

        return view('comandes', compact('comandes'));
    }
}
