<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class producte extends Model
{
    protected $table ="producte";

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function comanda()
    {
        return $this->belongsToMany(Comanda::class, 'comanda_producte');
    }
    
    public function getRouteKeyName()
    {
        return 'nom';
    }
}
