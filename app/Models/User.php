<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $fillable = [
        'identification',
        'name',
        'last_name',
        'birthdate',
        'province',
        'city',
        'email',
        'phone',
        'address',
        'gender',
        'experience',
        'contract_number',
        'contract_year',
        'role_id',
        'photo',
        'password',
        'email_verified_at',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function athlete()
    {
        return $this->hasOne(Athlete::class);
    }

    public function coach()
    {
        return $this->hasOne(Coach::class);
    }

    public function functionary()
    {
        return $this->hasOne(Functionary::class);
    }
}
