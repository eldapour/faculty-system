<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class UniversitySetting extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['title','description','address'];

    protected $fillable = [
        'email',
        'logo',
        'stamp_logo',
        'title',
        'description',
        'address',
        'maintenance',
        'facebook_link',
        'whatsapp_link',
        'youtube_link',
        'reregister_start',
        'reregister_end',
        'phone',
        'digital_student_platform',
        'colleges_digital_platform',
        'colleges_digital_magazine',
    ];

    protected $casts = [
        'title' => 'json',
        'description' => 'json',
        'address' => 'json',
    ];
}
