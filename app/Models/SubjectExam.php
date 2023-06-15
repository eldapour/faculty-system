<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubjectExam extends Model
{
    use HasFactory;

    protected $fillable = [
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

}
