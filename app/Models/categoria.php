<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table ="categoria";

    public function producte()
    {
        return $this->hasMany(Producte::class);
    }
    
    public function getRouteKeyName()
    {
        return 'nom';
    }
}
