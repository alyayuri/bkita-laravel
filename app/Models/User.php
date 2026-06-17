<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * MASS ASSIGNABLE
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'foto',
        'kelas',
    ];

    /**
     * HIDDEN
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * CASTS
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}