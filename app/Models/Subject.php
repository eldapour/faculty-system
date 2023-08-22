<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['subject_name'];

    protected $fillable = [
        'subject_name',
        'group_id',
        'department_id',
        'department_branch_id',
        'code',
        'unit_id'
    ];

    protected $casts = [
        'subject_name' => 'json'
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }


    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function department_branch(): BelongsTo
    {
        return $this->belongsTo(DepartmentBranch::class, 'department_branch_id', 'id');
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(SubjectUnitDoctor::class, 'id', 'subject_id');
    }


    public function students(): BelongsToMany{

        return $this->belongsToMany(User::class,'subject_exam_students','subject_id','user_id','id','id')
            ->withPivot(['exam_code','section','period','session','year'])
            ->withTimestamps();
    }


}
