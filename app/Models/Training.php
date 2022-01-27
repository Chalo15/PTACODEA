<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    public function athelete()
    {
        return $this->belongsTo(Athlete::class);
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
