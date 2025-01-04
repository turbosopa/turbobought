<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pagament extends Model
{
    protected $table ="pagament";

    protected $fillable = ['tipus', 'comanda_id'];

    public function comanda()
    {
        return $this->belongsTo(Comanda::class);
    }
}
