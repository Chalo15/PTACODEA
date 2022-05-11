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
        'coach_id',
        'state',
        'blood',
        'laterality',
        'category',
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

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }

    public function physios()
    {
        return $this->hasMany(Physio::class);
    }

    public function musculars()
    {
        return $this->hasMany(Muscular::class);
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
