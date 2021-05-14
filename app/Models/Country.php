<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends BaseModel
{
    use SoftDeletes,HasFactory;

    public $fillable = [
        'name',
        'ext',
        'status',
        'no_ads',
        'no_users',
        'no_cities',
    ];

    public function city()
    {
        return $this->hasMany(City::class, 'country_id', 'id');
    }

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class, 'advertisement_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'country_id', 'id');
    }
}
