<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Presentation extends Model
{
    use HasFactory;

    public array $translatable = ['title', 'description'];

    protected $fillable = [
        'title',
        'description',
        'images',
        'experience_year',
        'category_id'
    ];

    protected $casts = [
        'title' => 'json',
        'description' => 'json',
        'images' => 'json'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
