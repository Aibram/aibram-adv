<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends BaseModel
{
    use SoftDeletes,HasFactory;

    public $fillable = [
        'name',
        'status',
        'no_ads',
        'no_users',
        'country_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class, 'advertisement_id', 'id');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'city_id', 'id');
    }
}
