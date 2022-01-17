<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'phone',
        'sport_id',
        'user_id',
        'url'
    ];

    /**
     * Obtener el usuario al que pertenece el entrenador.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtener el deporte al que pertenece el entrenador.
     */
    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
