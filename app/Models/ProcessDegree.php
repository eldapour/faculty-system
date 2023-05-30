<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessDegree extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject_id',
        'doctor_id',
        'period',
        'year',
        'section',
        'exam_code',
        'student_degree_before_request',
        'request_type',
        'request_status',
        'students_degree_after_request',
        'processing_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')
        ->where('user_type', 'student');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id')
            ->where('user_type', 'doctor');
    }
}
