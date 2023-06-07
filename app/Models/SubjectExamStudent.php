<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectExamStudent extends Model
{
    protected $guarded = ['id'];

    public function group()
    {
        return $this->belongsTo(Group::class,'group_id','id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }

    public function departmentBranch()
    {
        return $this->belongsTo(DepartmentBranch::class,'department_branch_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
}
