<?php

namespace App\Http\Controllers;

use App\Models\producte;
use App\Models\categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProducteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Producte $producte)
    {
        $categoria = Categoria::where('id', $producte->categoria_id)->get();
        return view('producte',compact(['categoria','producte']));
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
    public function show(producte $producte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(producte $producte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, producte $producte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(producte $producte)
    {
        //
    }
}
