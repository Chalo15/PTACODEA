<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra_data extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'achievements',
        'other_organization',
        'other_data',
        'url',

    ];

    protected $guarded = [];

}
