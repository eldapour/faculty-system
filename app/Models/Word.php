<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = [
        'name',
        'description',
        'role',
        'image',
        'category_id',
    ];

    protected $casts = [
        'name'=>'json',
        'description'=>'json',
        'role'=>'json',
    ];
}
