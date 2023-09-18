<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Group extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['group_name'];

    protected $fillable = [
        'group_name',
        'group_code'
    ];

    protected $casts = [
        'group_name' => 'json',
    ];
}
