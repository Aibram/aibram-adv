<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MobileMessage extends BaseModel
{
    use HasFactory;

    public $fillable = [
        'provider',
        'mobile',
        'reason',
        'options',
        'title',
        'response',
    ];
}
