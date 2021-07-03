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
        'icon',
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

    public function getIconFormattedAttribute()
    {
        return $this->icon && !empty($this->icon) ? explode(" ",$this->icon)[1]:'fa-bars';
    }

    public function getCategoryHierarchyIdsAttribute()
    {
        return implode(",",$this->getCategoryHierarchyIds($this->id,[]));
    }
    /**
        * @return array
    */
    private function getCategoryHierarchyIds($category_id,$list)
    {
        array_push($list,$category_id);
        $children = Category::where(['id'=>$category_id])->withTrashed()->first()->activeChildren;
        foreach($children as $child){
            $list = $this->getCategoryHierarchyIds($child->id,$list);
        }
        return $list;
    }

    public function scopeMain($query,$value)
    {
        return $query->where('main',$value);
    }
    public function scopeHome($query,$value)
    {
        return $query->where('home',$value);
    }

    public function scopeMyparent($query,$value)
    {
        return $value ? $query->whereNull('parent_id') : $query->whereNotNull('parent_id');
    }

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class, 'advertisement_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function activeChildren()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->active(1);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    
}
