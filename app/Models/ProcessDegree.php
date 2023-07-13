<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProcessDegree extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject_id',
        'doctor_id',
        'session',
        'year',
        'section',
        'exam_code',
        'student_degree_before_request',
        'request_type',
        'request_status',
        'students_degree_after_request',
        'processing_date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id')
            ->where('user_type', 'doctor');
    }
}
