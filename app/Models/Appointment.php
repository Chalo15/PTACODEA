<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'coach_id',
        'availability_id',
        'user_id'
    ];

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function availability()
    {
        return $this->belongsTo(Availability::class);
    }
}
