<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class AdComment extends BaseModel
{
    use HasFactory,SoftDeletes;
    public $fillable = [
         'comment'
        ,'user_id'
        ,'advertisement_id'
        ,'parent_id'
    ];

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class,'advertisement_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
