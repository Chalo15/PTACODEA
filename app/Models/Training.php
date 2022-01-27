<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'athlete_id',
        'date'      ,
        'type_training',
        'calcification',
        'time'      ,
        'distance'  ,
        'level'     ,
        'planification',
        'lesion'    ,
        'get_better',
        'details'
    ];

    public function athlete()
    {
        return $this->belongsTo(Athlete::class);
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
