<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Translatable\HasTranslations;


/**
 * @property $user_type
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use HasTranslations;

    //translate data
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
        'job_id',
        'university_register_year',
        'email',
        'password',
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


    public function subjects(): BelongsToMany{

        return $this->belongsToMany(Subject::class,'subject_students','user_id','subject_id','id','id')
            ->withPivot(['group_id', 'year','period'])
            ->withTimestamps();
    }



}


