<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'background_image',
        'video_url',
    ];

    protected $casts = [
        'title' => 'json',
        'description' => 'json',
    ];
}
