<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\producte;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    
    public function index()
    {
        $categories = Categoria::all();
        $productes = Producte::all();

        $carro = session('carro', []);

        return View('home',compact(['categories','productes','carro']));
    }
    public function indexcat(Request $request, Categoria $categoria)
    {

        $productes = Producte::where('categoria_id', $categoria->id)->get();

        $categories = Categoria::all();

        $carro = session('carro', []);

        return view('home', compact('categories', 'productes','carro'));
    }

    public function llistar()
    {
        $categories = Categoria::all();
        return view('categories', compact('categories'));
    }

    public function create()
    {
        return view('catcreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'descripcio' => 'nullable|string',
        ]);

        Categoria::create($request->all());
        return redirect()->route('categories')->with('success', 'Categoria creada correctament.');
    }

    public function edit(Categoria $categoria)
    {
        return view('catedit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'descripcio' => 'nullable|string',
        ]);

        $categoria->update($request->all());
        return redirect()->route('categories')->with('success', 'Categoria actualitzada correctament.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categories')->with('success', 'Categoria eliminada correctament.');
    }
}
