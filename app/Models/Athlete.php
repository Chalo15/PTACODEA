<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'sport_id',
        'state',
        'blood',
        'laterality',
        'name_manager',
        'lastname_manager',
        'manager',
        'identification_manager',
        'contact_manager',
        'url',
        'policy',
    ];

    /**
     * Obtener el usuario al que pertenece el atleta.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtener el deporte al que pertenece el atleta.
     */
    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function sessionData()
    {
        return $this->hasOne(SessionData::class);
    }
}
