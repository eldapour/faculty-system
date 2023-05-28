<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['subject_name'];

    protected $fillable = [
        'subject_name',
        'group_id'
    ];

    protected $casts = [
        'subject_name' => 'json'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
}
