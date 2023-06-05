<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function group(): BelongsTo{

        return $this->belongsTo(Group::class,'group_id','id');
    }

    public function department(): BelongsTo
    {

        return $this->belongsTo(Department::class,'department_id','id');
    }


    public function department_branch(): BelongsTo
    {

        return $this->belongsTo(DepartmentBranch::class,'department_branch_id','id');
    }


}
