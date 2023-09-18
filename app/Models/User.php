<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Translatable\HasTranslations;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'first_name',
        'last_name',
        'first_name_latin',
        'last_name_latin',
        'image',
        'points',
        'university_email',
        'identifier_id',
        'national_id',
        'student_type_id',
        'national_number',
        'nationality',
        'birthday_date',
        'birthday_place',
        'city_ar',
        'city_latin',
        'address',
        'country_address_ar',
        'country_address_latin',
        'user_status',
        'user_type',
        'job_id',
        'university_register_year',
        'email',
        'password',
        'professor_position'
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

    public function types(): BelongsTo
    {
        return $this->belongsTo(StudentType::class,'student_type_id','id');
    }

    public function user_department(): HasOne
    {
        $period = Period::where('status', 'start')->first();
        return $this->hasOne(DepartmentStudent::class)->where('period', '=', $period->period)
            ->where('year', '=', $period->year_start);
    }
    public function user_department_branch(): HasOne
    {
        $period = Period::where('status', 'start')->first();
        return $this->hasOne(DepartmentBranchStudent::class);
    }



}


