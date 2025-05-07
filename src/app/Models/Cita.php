<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'marca',
        'modelo',
        'matricula',
        'fecha',
        'hora',
        'duracion',
    ];

    /**
    * Relación: una cita pertenece a un usuario (cliente).
    */
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }
}
