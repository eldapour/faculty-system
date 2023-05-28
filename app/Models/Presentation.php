<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    use HasFactory;

    public array $translatable = ['title', 'description'];

    protected $fillable = [
        'title',
        'description',
        'images',
        'experience_year',
        'type',
        'category_id'
    ];

    protected $casts = [
        'title' => 'json',
        'description' => 'json',
        'images' => 'json'
    ];
}
