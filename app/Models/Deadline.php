<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    use HasFactory;

    protected $fillable = [
        "deadline_date_start",
        "deadline_date_end",
        "period",
        "year",
        "deadline_type"
    ];


}
