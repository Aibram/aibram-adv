<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserReport extends BaseModel
{
    use SoftDeletes,HasFactory;

    protected $guarded = [
        'id',
    ];
}
