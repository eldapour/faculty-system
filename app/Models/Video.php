<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Video extends Model
{
    use HasFactory , HasTranslations;

    public array $translatable = ['title', 'description'];


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
