<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserToken extends BaseModel
{
    public $fillable = [
        'type'
        ,'user_id'
        ,'token'
    ];
    use HasFactory;
}
