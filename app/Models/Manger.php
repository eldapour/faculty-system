<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manger extends Model
{
    use HasFactory;


    protected $fillable = [
        'first_name',
        'last_name',
        'image',
        'job_id',
        'email',
        'password',
        'user_type',
        'user_status',

    ];
}
