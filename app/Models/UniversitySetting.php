<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversitySetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'logo',
        'title',
        'description',
        'address',
        'maintenance',
        'facebook_link',
        'whatsapp_link',
        'youtube_link',
        'phone',
    ];

    protected $casts = [
        'title' => 'json',
        'description' => 'json',
        'address' => 'json',
    ];
}
