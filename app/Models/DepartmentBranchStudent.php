<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentBranchStudent extends Model
{
    protected $fillable = [
        'register_year',
        'branch_restart_register',
        'user_id',
        'department_branch_id',
    ];

    public function branch()
    {
        return $this->belongsTo(DepartmentBranch::class,'department_branch_id','id');
    }

    public function student()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }



}
