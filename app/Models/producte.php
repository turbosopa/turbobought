<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producte extends Model
{
    protected $table = "producte";

    protected $fillable = [
        'nom',
        'preu',
        'descripcio',
        'imatge',
        'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function comandes()
    {
        return $this->belongsToMany(Comanda::class, 'comanda_producte')
            ->withPivot('quantitat')
            ->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'nom';
    }
}
