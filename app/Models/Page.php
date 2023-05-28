<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasFactory ;

    protected $fillable = [
            'title',
            'description',
            'images',
            'files',
            'category_id',
    ];

    protected $casts = [
        'title' => 'json',
        'description' => 'json',
        'images' => 'json',
        'files' => 'json',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }
}
