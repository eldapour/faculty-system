<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name'
    ];

    protected $casts = [
        'category_name' => 'json',
    ];
    public function pages()
    {
        return $this->hasMany(Page::class, 'category_id', 'id');
    }
}
