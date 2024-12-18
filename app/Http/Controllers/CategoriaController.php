<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\producte;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categoria::all();
        $productes = Producte::all();

        return View('home',compact(['categories','productes']));
    }
    public function indexcat(Request $request, Categoria $categoria)
    {

        $productes = Producte::where('categoria_id', $categoria->id)->get();

        $categories = Categoria::all();

        return view('home', compact('categories', 'productes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categoria $categoria)
    {
        //
    }
}
