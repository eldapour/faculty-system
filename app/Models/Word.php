<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Word extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['name', 'description','role'];

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
