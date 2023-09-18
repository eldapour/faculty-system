<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['category_name'];

    protected $fillable = [
        'category_name'
    ];

    protected $casts = [
        'category_name' => 'json',
    ];
    public function pages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Page::class, 'category_id', 'id');
    }
}
