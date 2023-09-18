<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static get()
 * @method static create(array $array)
 */
class PointStatement extends Model
{
    protected $fillable = [
        'user_id',
        'element_id',
        'degree_student',
        'degree_element',
        'course',
        'year',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function element(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Element::class,'element_id','id');
    }
}
