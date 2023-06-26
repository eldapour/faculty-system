<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Department extends Model
{
    use HasFactory, HasTranslations;


    public array $translatable = ['department_name'];

    protected $fillable = [
        'department_name',
        'department_code'
    ];

    protected $casts = [
      'department_name' => 'json',
    ];
}
