<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Certificate extends Model
{
    use HasFactory;
    use HasTranslations;

    public array $translatable = ['description_situation_with_management','description_situation_with_treasury'];

    protected $fillable = [

        'certificate_type_id',
        'validation_year',
        'year',
        'user_id',
        'situation_with_management',
        'situation_with_treasury',
        'description_situation_with_management',
        'description_situation_with_treasury'

    ];


    public function user(): BelongsTo
    {

        return $this->belongsTo(User::class,'user_id','id');
    }

    public function certificateType(): BelongsTo
    {

        return $this->belongsTo(CertificateType::class,'certificate_type_id','id');
    }
}
