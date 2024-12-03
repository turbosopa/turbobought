<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pagament extends Model
{
    protected $table ="pagament";

    public function comanda()
    {
        return $this->belongsTo(Comanda::class);
    }
}
