<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdStatus extends BaseModel
{
    use HasFactory;

    public $fillable = [
        'status',
        'advertisement_id',
    ];

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class,'advertisement_id','id');
    }
}
