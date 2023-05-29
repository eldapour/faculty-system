<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubjectExam;

class SubjectExamStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_code',
        'section',
        'user_id',
        'subject_exam_id',
        'period',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function subjectExam()
    {
        return $this->belongsTo(SubjectExam::class, 'subject_exam_id', 'id');
    }
}
