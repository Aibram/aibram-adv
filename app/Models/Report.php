<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends BaseModel
{
    use HasFactory;

    public $guarded = [];

    public function reportable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
