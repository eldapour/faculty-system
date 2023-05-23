<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Translatable\HasTranslations;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use HasTranslations;

    public $translatable = ['city','birthday_place'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'image',
        'points',
        'personal_email',
        'university_email',
        'identifier_id',
        'national_id',
        'national_number',
        'nationality',
        'birthday_date',
        'birthday_place',
        'city',
        'address',
        'user_status',
        'user_type',
        'university_register_year',
        'job_id',
        'email',
        'password',
        'user_type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}


