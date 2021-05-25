<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivationCode extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'code', 'finished'
    ];
}
