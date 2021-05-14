<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserVisit extends BaseModel
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'advertisement_id',
    ];
}
