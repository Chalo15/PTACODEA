<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Physio extends Model
{
    use HasFactory;


    protected $fillable = [

        'athlete_id',
        'date',
        'sph',
        'app',
        'treatment',
        'surgeries',
        'fractures',
        'session_start',
        'session_end',
        'inability',
        'count_session',
        'severity',
        'details',
    ];

    protected $casts = [
        'date' => 'date'
    ];

    public function athlete()
    {
        return $this->belongsTo(Athlete::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
