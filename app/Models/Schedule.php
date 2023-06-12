<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];




    public function department(): BelongsTo
    {

        return $this->belongsTo(Department::class,'department_id','id');
    }


    public function unit(): BelongsTo
    {

        return $this->belongsTo(Unit::class,'unit_id','id');
    }





}
