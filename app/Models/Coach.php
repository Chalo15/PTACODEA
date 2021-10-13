<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function sport()
    {

        return $this->belongsTo(Sport::class);
    }

    public function athletes()
    {
        return $this->hasMany(Athlete::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [
      
    ];




    use HasFactory;
}
