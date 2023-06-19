<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class DepartmentBranch extends Model
{
    use HasFactory, HasTranslations;


    public array $translatable = ['branch_name','department_branch_code'];

    protected $fillable = [
        'branch_name',
        'department_id',
        'department_branch_code'
    ];

    protected $casts = [
      'branch_name' => 'json',
      'department_branch_code'
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }
}
