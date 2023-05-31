<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Certificate extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['diploma_name'];

    protected $fillable = [
        'diploma_name',
        'validation_year',
        'year',
        'user_id'
    ];

    public function user(){

        return $this->belongsTo(User::class,'user_id','id');
    }
}
