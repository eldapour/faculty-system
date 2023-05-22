<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'image',
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
      ];
}
