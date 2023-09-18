<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FacultyCount extends Model
{
    use HasTranslations;

    public array $translatable = ['title'];

    protected $fillable = [
        'title',
        'image',
        'count'
    ];
    protected $casts = [
        'title' => 'json'
    ];
}
