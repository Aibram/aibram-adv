<?php


namespace App\Models\BaseModels;


use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;
use App\Traits\MediaTrait;

class BaseModel extends Model
{
    use HasHashid, HashidRouting,MediaTrait;
    
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function scopeActive($query,$value)
    {
        return $query->where('status', $value);
    }

    public function getDescStatusAttribute()
    {
        return $this->status > 0? __('base.deactivated') : __('base.activated');
    }
}
