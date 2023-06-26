<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateType extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificate_type_ar',
        'certificate_type_en',
        'certificate_type_fr',
        'code'
    ];


}
