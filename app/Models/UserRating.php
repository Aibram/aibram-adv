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
}
