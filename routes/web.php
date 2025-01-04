<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProducteController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ComandaController;

Route::get('/comandes', [ComandaController::class, 'index'])
    ->middleware('auth')
    ->name('comandes');

Route::get('/administrar/productes', [ProducteController::class, 'llistar'])->middleware(['auth'])->name('productes');
Route::get('/producte/{producte}/edit', [ProducteController::class, 'edit'])->middleware(['auth'])->name('producte.edit');
Route::delete('/producte/{producte}', [ProducteController::class, 'destroy'])->middleware(['auth'])->name('producte.destroy');
Route::put('/producte/{producte}/update', [ProducteController::class, 'update'])->middleware(['auth'])->name('producte.update');
Route::get('/producte/create', [ProducteController::class, 'create'])->middleware(['auth'])->name('producte.create');
Route::post('/producte/store', [ProducteController::class, 'store'])->middleware(['auth'])->name('producte.store');

Route::get('/administrar/categories', [CategoriaController::class, 'llistar'])->middleware(['auth'])->name('categories');
Route::get('/categories/create', [CategoriaController::class, 'create'])->middleware(['auth'])->name('categoria.create');
Route::post('/categories/store', [CategoriaController::class, 'store'])->middleware(['auth'])->name('categoria.store');
Route::get('/categories/{categoria}/edit', [CategoriaController::class, 'edit'])->middleware(['auth'])->name('categoria.edit');
Route::put('/categories/{categoria}/update', [CategoriaController::class, 'update'])->middleware(['auth'])->name('categoria.update');
Route::delete('/categories/{categoria}', [CategoriaController::class, 'destroy'])->middleware(['auth'])->name('categoria.destroy');

Route::post('/afegir-carro/{producte}', [CarritoController::class, 'afegir'])->middleware(['auth'])->name('afegir.carro');
Route::post('/buidar-carro', [CarritoController::class, 'buidar'])->middleware(['auth'])->name('buidar.carro');
Route::post('/comprar-carro/{metode}', [CarritoController::class, 'comprar'])->middleware(['auth'])->name('comprar.carro');

Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', [CategoriaController::class, 'index'])->name('home');
Route::get('/ctg/{categoria}', [CategoriaController::class, 'indexcat'])->name('homecat');

Route::get('/pdt/{producte}', [ProducteController::class, 'index'])->name('producte');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
