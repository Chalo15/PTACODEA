<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    public function athletes()
    {
        return $this->hasMany(Athlete::class);
    }

    public function coaches()
    {
        return $this->hasMany(Coach::class);
    }
}
