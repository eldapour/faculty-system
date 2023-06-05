<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class DepartmentBranch extends Model
{
    use HasFactory, HasTranslations;


    public array $translatable = ['branch_name'];

    protected $fillable = [
        'branch_name',
        'department_id'
    ];

    protected $casts = [
      'branch_name' => 'json'
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }
}
