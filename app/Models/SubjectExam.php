<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SubjectExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_code',
        'group_id',
        'subject_id',
        'exam_date',
        'time_start',
        'time_end',
        'exam_day',
        'year',
        'period',
        'session',
    ];



    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }




}
