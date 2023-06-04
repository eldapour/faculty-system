<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static CreateOrUpdate(\Illuminate\Http\Request $request)
 */
class DataModification extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'data_modification_type'=> 'json'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
