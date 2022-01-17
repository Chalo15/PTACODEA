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

    /**
     * Los atributos que deben ocultarse para la serialización.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deben emitirse.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
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

    /**
     * Obtener el role al que pertenece el usuario.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Consigue el atleta asociado con el usuario.
     */
    public function athlete()
    {
        return $this->hasOne(Athlete::class);
    }

    /**
     * Consigue el entrenador asociado con el usuario.
     */
    public function coach()
    {
        return $this->hasOne(Coach::class);
    }

    public function functionary()
    {
        return $this->hasOne(Functionary::class);
    }
}
