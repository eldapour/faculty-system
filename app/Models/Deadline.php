<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    use HasFactory;

    protected $fillable = [
        "description",
        "deadline_date_end",
        "deadline_date_start"
    ];

    protected $casts = [
        "description" => "json",
    ];
}
