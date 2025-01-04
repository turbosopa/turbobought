<?php

namespace App\Http\Controllers;

use App\Models\comanda;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComandaController extends Controller
{
    public function index()
    {
        // Obté l'usuari autenticat
        $usuari = auth()->user();

        // Obté totes les comandes de l'usuari amb els productes i el seu pivot
        $comandes = Comanda::where('usuari_id', $usuari->id)
            ->with('productes') // Carrega la relació amb els productes
            ->with('pagament')  // Carrega la relació amb els pagaments
            ->get();

        // Retorna la vista amb les comandes
        return view('comandes', compact('comandes'));
    }
}
