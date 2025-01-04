<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\producte;
use App\Models\comanda;

class CarritoController extends Controller
{
    public function afegir(Request $request, Producte $producte)
    {
        if (auth()->guest()) {
            return redirect()->route('dashboard')->with('error', 'Cal iniciar sessió per afegir productes al carro.');
        }

        $carro = session()->get('carro', []);

        $producteTrobat = false;

        foreach ($carro as &$item) {
            $dades = explode(':', $item);

            if ($dades[0] === $producte->nom) {
                $dades[2]++;
                $item = implode(':', $dades);
                $producteTrobat = true;
                break;
            }
        }

        if (!$producteTrobat) {
            $carro[] = $producte->nom . ':' . $producte->preu . ':1';
        }

        session(['carro' => $carro]);

        return redirect()->route('home')->with('success', 'Producte afegit al carro!');
    }


    public function buidar()
    {
        session()->forget('carro');

        return redirect()->route('home')->with('success', 'El carro s\'ha buidat correctament!');
    }

    public function comprar(Request $request, $metode)
    {
        $carro = session()->get('carro', []);
        if (empty($carro)) {
            return redirect()->route('home')->with('error', 'El carro està buit!');
        }

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $metodesValidats = ['bizum', 'targeta', 'paypal'];
        if (!in_array($metode, $metodesValidats)) {
            return redirect()->route('home')->with('error', 'Mètode de pagament no vàlid.');
        }

        $preutotal = 0;
        foreach ($carro as $item) {
            [$nom, $preu, $quan] = explode(':', $item);
            $preutotal += $preu * $quan;
        }

        $comanda = new Comanda();
        $comanda->usuari_id = Auth::id();
        $comanda->data = now();
        $comanda->preutot = $preutotal;
        $comanda->save();

        foreach ($carro as $item) {
            [$nom, $preu, $quan] = explode(':', $item);
            $producte = Producte::where('nom', $nom)->first();

            if ($producte) {
                $comanda->productes()->attach($producte->id, [
                    'quantitat' => $quan,
                ]);
            }
        }

        $comanda->pagament()->create([
            'tipus' => $metode,
        ]);

        session()->forget('carro');

        return redirect()->route('home')->with('success', 'Compra completada amb èxit!');
    }
}