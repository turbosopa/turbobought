<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producte extends Model
{
    protected $table = "producte";

    protected $fillable = [
        'nom', // Exemple: Nom del producte
        'preu', // Exemple: Preu del producte
        'descripcio', // Exemple: Descripció del producte
        'imatge', // Exemple: Enllaç a la imatge
        'categoria_id', // Exemple: Relació amb categoria
    ];

    // Relació amb categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    // Relació amb comandes (belongsToMany)
    public function comandes()
    {
        return $this->belongsToMany(Comanda::class, 'comanda_producte')
            ->withPivot('quantitat') // Inclou la quantitat de la taula intermediària
            ->withTimestamps(); // Afegeix els timestamps de la taula pivot
    }

    // Definició del camp per fer rutes amigables
    public function getRouteKeyName()
    {
        return 'nom';
    }
}
