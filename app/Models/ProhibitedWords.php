<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProhibitedWords extends BaseModel
{
    use HasFactory;

    public $fillable = [
        'word',
    ];
}
