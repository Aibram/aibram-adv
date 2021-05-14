<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactUs extends BaseModel
{
    use HasFactory;

    public $fillable = [
        'name',
        'mobile',
        'subject',
        'message',
        'device',
        'contacted',
        'contacted_at',
    ];
}
