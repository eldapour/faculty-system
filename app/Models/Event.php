<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Spatie\Translatable\HasTranslations;

class Event extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['title','description'];


    protected $fillable = [
        'title',
        'description',
        'image',
        'background_image',
        'category_id',
    ];

    protected $casts = [
        'title' => 'json',
        'description' => 'json',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
