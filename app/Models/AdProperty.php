<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdProperty extends BaseModel
{
    use SoftDeletes,HasFactory;
    public $fillable = [
        'advertisement_id',
        'property'
    ];

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class,'advertisement_id','id');
    }

}
