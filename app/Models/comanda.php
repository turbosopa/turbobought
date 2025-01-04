<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Producte;

class Comanda extends Model
{
    protected $table = "comanda";

    // Relació amb l'usuari
    public function usuari()
    {
        return $this->belongsTo(User::class);
    }

    // Relació amb productes (belongsToMany)
    public function productes()
    {
        return $this->belongsToMany(Producte::class, 'comanda_producte')
            ->withPivot('quantitat') // Inclou la quantitat de la taula intermitja
            ->withTimestamps();      // Guarda timestamps
    }

    // Relació amb pagament
    public function pagament()
    {
        return $this->hasOne(Pagament::class);
    }

    // Càlcul del preu total de la comanda
    public function preuTotal()
    {
        return $this->productes->sum(function ($producte) {
            return $producte->pivot->quantitat * $producte->preu;
        });
    }
}
