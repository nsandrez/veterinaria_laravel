<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'estado',
        'rol',
        'telefono',
        'reset_token',
        'token_expiry',
        'ultima_conexion',
        'foto_perfil',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'reset_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'token_expiry' => 'datetime',
        'ultima_conexion' => 'datetime',
        'password' => 'hashed',
    ];
}
