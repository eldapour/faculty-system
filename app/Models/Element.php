<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'period',
        'department_branch_id',
    ];

    protected $casts = [
        'name' => 'json',
    ];

    public function department_branch()
    {
        return $this->belongsTo(DepartmentBranch::class, 'department_branch_id', 'id');
    }
}
