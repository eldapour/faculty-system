<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectUnitDoctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'user_id',
        'group_id',
        'subject_id',
        'unit_id',
        'period',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')
            ->where('user_type', 'doctor');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
