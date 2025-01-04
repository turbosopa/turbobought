<?php

namespace App\Http\Controllers;

use App\Models\producte;
use App\Models\categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProducteController extends Controller
{
    public function index(Producte $producte)
    {
        $categoria = Categoria::where('id', $producte->categoria_id)->get();
        return view('producte',compact(['categoria','producte']));
    }
    public function llistar()
    {
        if (!Auth::user()->admin) {
            return redirect()->route('home');
        }

        $productes = Producte::all();

        return view('productes', compact('productes'));
    }
    public function edit(Producte $producte)
    {
        return view('prodedit', compact('producte'));
    }
    public function destroy(Producte $producte)
    {
        $producte->delete();

        return redirect()->route('productes')->with('success', 'Producte eliminat correctament.');
    }
    public function update(Request $request, Producte $producte)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'preu' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'numeric', 'min:0'],
            'descripcio' => 'nullable|string',
            'imatge' => 'required|string',
            'categoria_id' => 'required|exists:categoria,id',
        ]);

        $producte->update($request->all());

        return redirect()->route('productes')->with('success', 'Producte actualitzat correctament.');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'preu' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'numeric', 'min:0'],
            'descripcio' => 'nullable|string',
            'imatge' => 'required|string',
            'categoria_id' => 'required|exists:categoria,id',
        ]);

        Producte::create($request->all());

        return redirect()->route('productes')->with('success', 'Producte creat correctament.');
    }
    public function create()
    {
        return view('prodcreate');
    }
}
