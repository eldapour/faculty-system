<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubjectExam;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubjectExamStudentResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_degree',
        'exam_degree',
        'date_enter_degree',
        'period',
        'group_id',
        'year',
        'user_id',
        'subject_id'
    ];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
    public function processResultRequestSubject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->where('user_type', 'student');
    }

}
