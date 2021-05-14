<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FavoriteItem extends BaseModel
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'advertisement_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class,'advertisement_id','id');
    }
}
