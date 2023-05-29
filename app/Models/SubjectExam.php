<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_date',
        'exam_day',
        'period',
        'session',
        'time_start',
        'time_end',
        'group_id',
        'subject_id',
    ];


}
