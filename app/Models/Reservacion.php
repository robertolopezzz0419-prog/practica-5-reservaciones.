<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservacion extends Model
{
    protected $table = 'reservaciones';
    protected $fillable = [
        'user_id',
        'equipo_id',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'estado'
    ];

    public function usuario(): BelongsTo
{
    return $this->belongsTo(User::class, 'user_id');
}

    public function equipo(): BelongsTo
    {
        return $this->belongsTo(Equipo::class);
    }
}