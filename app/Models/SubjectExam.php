<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'department_id',
        'department_branch_id',
        'subject_id',
        'exam_date',
        'time_start',
        'time_end',
        'exam_day',
        'year',
        'period',
        'session',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    public function branch()
    {
        return $this->belongsTo(DepartmentBranch::class, 'department_branch_id', 'id');
    }
}
