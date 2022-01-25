<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muscular extends Model
{
    use HasFactory;

    public function athelete()
    {
        return $this->belongsTo(Athlete::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $guarded = [];

    protected $fillable = [
            'date'   ,
            'physiological_age',
            'weight'           ,
            'height'           ,
            'bmi'              ,
            'waist'            ,
            'hip'        ,
            'cint'       ,
            'tricipital' ,
            'subscapular',
            'abdominal'  ,
            'suprailiac' ,
            'thigh'      ,
            'calf'       ,
            'wrist'   ,
            'elbow'   ,
            'knee'    ,
            'biceps'  ,
            'calf_cm' ,
            'calories',
            'BMI_high',
            'icc_high',
            'fat'     ,
            'residual',
            'bone'    ,
            'muscle'  ,
            'visceral',
            'ideal_weight',
            'get_better'
    ];
}
