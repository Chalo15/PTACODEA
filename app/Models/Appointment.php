<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'athlete_id',
        'availability_id'
    ];

    public function athlete()
    {
        return $this->belongsTo(Athlete::class);
    }

    public function availability()
    {
        return $this->belongsTo(Availability::class);
    }
}
