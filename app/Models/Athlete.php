<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    public function user()
    {

        return $this->belongsTo('App\Models\User');
    }

    public function sport()
    {

        return $this->belongsTo('App\Models\sport');
    }

    public function coach()
    {

        return $this->belongsTo('App\Models\coach');
    }
    use HasFactory;
}
