<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalAd extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "date_ads",
        "url_ads",
        "status",
        "service_id"
    ];

    protected $casts = [
        'title' => 'json',
        'description' => 'json'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
