<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function sport()
    {

        return $this->belongsTo(Sport::class);
    }

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    protected $fillable = [
        'identification',
        'name',
        'lastname',
        'email',        
    ];
}
