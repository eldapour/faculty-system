<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['service_name'];


    protected $fillable = [
        "service_name"
    ];

    protected $casts = [
        "service_name" => "json",
    ];
}
