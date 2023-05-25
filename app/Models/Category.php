<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    use HasTranslations;

    public array $translatable = ['category_name'];

    protected $fillable = [
        'category_name'
    ];

    protected $casts = [
        'category_name' => 'json',
    ];
}
