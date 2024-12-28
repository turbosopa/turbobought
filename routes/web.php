<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProducteController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', [CategoriaController::class, 'index'])->name('home');
Route::get('/ctg/{categoria}', [CategoriaController::class, 'indexcat'])->name('homecat');

Route::get('/pdt/{producte}', [ProducteController::class, 'index'])->name('producte');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
