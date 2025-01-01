<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\producte;

class CarritoController extends Controller
{
    public function afegir(Request $request, Producte $producte)
    {
        if (auth()->guest()) {
            return redirect()->route('dashboard')->with('error', 'Cal iniciar sessió per afegir productes al carro.');
        }
        // Obté la llista del carro de la sessió
        $carro = session()->get('carro', []);

        // Afegeix el producte com una cadena de text "nom:preu"
        $carro[] = $producte->nom . ':' . $producte->preu;

        // Desa el carro actualitzat a la sessió
        session(['carro' => $carro]);

        // Torna a la pàgina principal amb un missatge d'èxit
        return redirect()->route('home')->with('success', 'Producte afegit al carro!');
    }


    public function buidar()
{
    // Esborra el contingut del carro de la sessió
    session()->forget('carro');

    // Torna a la pàgina principal amb un missatge d'èxit
    return redirect()->route('home')->with('success', 'El carro s\'ha buidat correctament!');
}
}