<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRating extends BaseModel
{
    use SoftDeletes,HasFactory;

    public $fillable = [
        'user_id',
        'rated_user_id',
        'advertisement_id',
        'stars',
        'comment',
    ];

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class,'advertisement_id','id');
    }

    public function ratedUser()
    {
        return $this->belongsTo(User::class,'rated_user_id','id');
    }
}
