<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Producte;

class Comanda extends Model
{
    protected $table = "comanda";

    public function usuari()
    {
        return $this->belongsTo(User::class);
    }

    public function productes()
    {
        return $this->belongsToMany(Producte::class, 'comanda_producte')
            ->withPivot('quantitat')
            ->withTimestamps();
    }

    public function pagament()
    {
        return $this->hasOne(Pagament::class);
    }
}
