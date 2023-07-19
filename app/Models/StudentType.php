<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * @method static create(array $inputs)
 * @method static findOrFail($id)
 */
class StudentType extends Model
{
    use HasTranslations;

    public array $translatable = ['student_type'];

    protected $fillable = [
        'student_type','notes'
    ];

    protected $casts = [
        'student_type' => 'json'
    ];
}
