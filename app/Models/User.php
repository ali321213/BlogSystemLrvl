<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name',
        'email',
        'country',
        'state',
        'city',
        'phone_number',
        'password',
    ];

    // Make sure that the password is hidden from arrays
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Specify the attributes that should be cast to native types
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}