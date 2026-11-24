<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipo extends Model
{
    protected $fillable = [
        'nombre',
        'tipo',
        'descripcion',
        'disponible'
    ];

    public function reservaciones(): HasMany
    {
        return $this->hasMany(Reservacion::class);
    }
}