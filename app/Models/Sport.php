<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    /**
     * Obtenga los atletas para el deporte.
     */
    public function athletes()
    {
        return $this->hasMany(Athlete::class);
    }

    /**
     * Obtenga los entrenadores para deporte.
     */
    public function coaches()
    {
        return $this->hasMany(Coach::class);
    }
}
