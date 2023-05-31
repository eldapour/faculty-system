<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'attachment_file',
        'period',
        'year',
        'request_date',
        'request_status',
        'processing_request_date',
        'reason',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
