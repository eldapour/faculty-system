<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentBranch extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_name',
        'department_id'
    ];

    protected $casts = [
      'branch_name' => 'json'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }
}
