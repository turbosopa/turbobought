<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comanda extends Model
{
    protected $table ="comanda";

    public function usuari()
    {
        return $this->belongsTo(User::class);
    }

    public function producte()
    {
        return $this->belongsToMany(Producte::class, 'comanda_producte');
    }

    public function pagament()
    {
        return $this->belongsTo(Pagament::class);
    }
}
