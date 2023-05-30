<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class DocumentType extends Model
{

    use HasTranslations;

    use HasFactory;
    public $translatable = ['document_name'];

    protected $guarded = [];
}
