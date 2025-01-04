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

        // Obté el carro actual de la sessió
        $carro = session()->get('carro', []);

        // Inicialitza una bandera per indicar si el producte ja existeix
        $producteTrobat = false;

        // Recorre els productes del carro per comprovar si el producte ja existeix
        foreach ($carro as &$item) {
            $dades = explode(':', $item); // Divideix la cadena "nom:preu:quantitat"

            if ($dades[0] === $producte->nom) {
                // Si el producte ja existeix, incrementa la quantitat
                $dades[2]++; // Incrementa la quantitat
                $item = implode(':', $dades); // Torna a convertir a cadena
                $producteTrobat = true;
                break;
            }
        }

        // Si no s'ha trobat el producte, afegeix-lo amb quantitat 1
        if (!$producteTrobat) {
            $carro[] = $producte->nom . ':' . $producte->preu . ':1';
        }

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

    public function comprar(Request $request, $metode)
    {
        // Comprova si hi ha productes al carro
        $carro = session()->get('carro', []);
        if (empty($carro)) {
            return redirect()->route('home')->with('error', 'El carro està buit!');
        }

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Valida el mètode de pagament
        $metodesValidats = ['bizum', 'targeta', 'paypal'];
        if (!in_array($metode, $metodesValidats)) {
            return redirect()->route('home')->with('error', 'Mètode de pagament no vàlid.');
        }

        // Crea una nova comanda
        $comanda = new Comanda();
        $comanda->usuari_id = Auth::id(); // Associa la comanda a l'usuari autenticat
        $comanda->data = now();           // Data actual per la comanda
        $comanda->save();

        // Afegir els productes del carro a la comanda
        foreach ($carro as $item) {
            [$nom, $preu, $quan] = explode(':', $item);
            $producte = Producte::where('nom', $nom)->first(); // Busca el producte per nom

            if ($producte) {
                // Crea la relació entre la comanda i el producte
                $comanda->productes()->attach($producte->id, [
                    'quantitat' => $quan, // Usa la quantitat del carro
                ]);
            }
        }

        // Crea el registre del pagament
        $comanda->pagament()->create([
            'tipus' => $metode,
        ]);

        // Buida el carro després de la compra
        session()->forget('carro');

        // Redirigeix amb un missatge de confirmació
        return redirect()->route('home')->with('success', 'Compra completada amb èxit!');
    }
}