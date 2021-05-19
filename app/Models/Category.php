<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends BaseModel
{
    use SoftDeletes,HasFactory;

    public $fillable = [
        'name',
        'desc',
        'parent_id',
        'home',
        'main',
        'ordering',
        'status',
        'no_ads',
    ];
    public function formatTreeJS(){
        return [
            "id" => $this->id,
            "icon" => "fa fa-folder icon-lg kt-font-info",
            "text" => $this->name,
            "state" => [
                "selected" => false
            ],
            "children" => $this->children()->count()>0?true:false,
        ];
    }

    public function registerMediaGroups()
    {
        $this->addMediaGroup($this->mainImageCollection)
             ->performConversions('category_icon');
    }

    public function scopeMain($query,$value)
    {
        return $query->where('main',$value);
    }
    public function scopeHome($query,$value)
    {
        return $query->where('home',$value);
    }

    public function scopeParent($query)
    {
        return $query->where('parent_id',null);
    }

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class, 'advertisement_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    
}
