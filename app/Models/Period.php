<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model{


    use HasFactory;

    protected $fillable = [

        'period_start_date',
        'period_end_date',
        'period',
        'year_start',
        'year_end',
        'status'

    ];


}

