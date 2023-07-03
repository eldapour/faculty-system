<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Unit extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['unit_name'];

    protected $fillable = [
        'unit_name',
        'unit_code'

    ];

    protected $casts = [
        'unit_name' => 'json',
    ];


}
