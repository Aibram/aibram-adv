<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentTaggable\Taggable;
use App\Models\AdProperty;
use App\Models\AdComment;
use App\Models\AdStatus;
use App\Models\ChatList;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Advertisement extends BaseModel
{
    use SoftDeletes,Taggable,Sluggable,HasFactory,SluggableScopeHelpers;
    protected $morphClass = 'Advertisement';

    protected $casts = [
        'avg_rate' => 'integer',
    ];

    public $fillable = [
        'title',
        'slug',
        'country_id',
        'city_id',
        'category_id',
        'user_id',
        'region',
        'price',
        'address',
        'contact_method',
        'mobile',
        'desc',
        'featured',
        'home',
        'status',
        'no_properties',
        'no_chatlists',
        'no_ratings',
        'no_favorites',
    ];

    public function registerMediaGroups()
    {
        $this->addMediaGroup($this->mainImageCollection)
             ->performConversions('ads_thumbnail');
        $this->addMediaGroup($this->secondaryImagesCollection)
             ->performConversions('ads_photos');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function scopeFeatured($query,$value)
    {
        return $query->where('featured',$value);
    }

    public function scopeHome($query,$value)
    {
        return $query->where('home',$value);
    }

    public function getAdMobileAttribute()
    {
        return $this->mobile ?? $this->user->ext.$this->user->mobile;
    }

    public function getTitleFormattedAttribute()
    {
        return strlen($this->title)>30 ? $this->title.'...' : $this->title ;
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function properties()
    {
        return $this->hasMany(AdProperty::class, 'advertisement_id', 'id')->orderBy('created_at','desc');
    }
    public function chatlists()
    {
        return $this->hasMany(ChatList::class, 'advertisement_id', 'id')->orderBy('created_at','desc');
    }
    public function statuses()
    {
        return $this->hasMany(AdStatus::class, 'advertisement_id', 'id')->orderBy('created_at','desc');
    }
    public function userFavoriteList(){
        return $this
            ->belongsToMany(User::class, 'favorite_items', 'advertisement_id', 'user_id')
            // ->withPivot(['price','notes','accepted'])
            ->withTimestamps();
    }
    public function userComments(){
        return $this
            ->belongsToMany(User::class, 'ad_comments', 'advertisement_id', 'user_id')
            ->withPivot(['comment','parent_id'])
            ->withTimestamps();
    }
    public function visitedUsers(){
        return $this
            ->belongsToMany(User::class, 'user_visits', 'advertisement_id', 'user_id')
            // ->withPivot(['price','notes','accepted'])
            ->withTimestamps();
    }
    public function reportedUsers(){
        return $this
            ->belongsToMany(User::class, 'user_reports', 'advertisement_id', 'user_id')
            ->withPivot(['reason'])
            ->withTimestamps();
    }
    public function ratedUsers(){
        return $this
            ->belongsToMany(User::class, 'user_ratings', 'advertisement_id', 'user_id')
            ->withPivot(['rated_user_id','stars','comment'])
            ->withTimestamps();
    }
    public function reports()
    {
        return $this->morphMany(Report::class, 'reportable');
    }
}
