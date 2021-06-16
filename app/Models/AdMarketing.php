<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdMarketing extends BaseModel
{
    use HasFactory;
    public $fillable = [
        'city_id',
        'age_from',
        'age_to',
        'gender',
        'advertisement_id'
    ];

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class,'advertisement_id','id');
    }
}
