<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'background_image',
        'category_id',
        'service_id'
    ];

    protected $casts = [
        'title' => 'json',
        'description' => 'json'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

}
