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
    protected $with = [
        'category',
        'country',
        'city',
        'user',
        'properties',
    ];
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
        'no_visits',
        'uid'
    ];

    public function format($columns=[]){
        $item = FavoriteItem::where(['advertisement_id'=>$this->id,'user_id'=>optional(currUser('user'))->id])->first();
        $user = $this->user;
        $currUserBool = checkLoggedIn('user') ?? checkLoggedIn('user-api');
        $return = [
            "id" => $this->id,
            "title" => $this->title,
            "title_formatted" => $this->title_formatted,
            "desc" => $this->desc,
            "avg_rate" => $this->user->avg_rate_derived,
            "no_ratings" => $this->user->no_ratings,
            "no_favorites" => $this->no_favorites,
            "slug" => $this->slug,
            "user_id" => $this->user_id,
            "user_name" => $user->name,
            "user_photo" => $user->photo,
            "favorited" => $currUserBool && $item,
            "photo" => $this->photo,
            "searchCategoryUrl" => getFullLink(route('frontend.ads'),['category_id'=>$this->category_hierarchy_ids]),
            "searchCityUrl" => getFullLink(route('frontend.ads'),['city_id'=>$this->city_id]),
            "profileUrl" => getFullLink(route('frontend.profile',['id'=>$this->user_id]),['id'=>$this->id]),
            "detailsUrl" => route('frontend.ad.details',['slug'=>$this->slug]),
            "category_id" => $this->category_id,
            "category_name" => $this->category_name,
            "category_hierarchy_ids" => $this->category_hierarchy_ids,
            "city_id" => $this->city_id,
            "city_name" => $this->city_name,
            "properties" => $this->properties,
            "created_at" => $this->created_at,
            "created_at_w3c" => $this->created_at->toW3CString(),
            "created_at_human" => $this->created_at->diffForHumans(),
            "mobile" => '+'.$this->ad_mobile,
            "uid" => $this->uid,
        ];
        if(in_array('comments',$columns))
            $return["comments"] = AdComment::where(['advertisement_id'=>$this->id,'parent_id'=>null])->get();
        if(in_array('taglist',$columns))
            $return["taglist"] = $this->taglist;
        if(in_array('secondary_photos',$columns))
            $return["secondary_photos"] = $this->secondary_photos;
        return $return;
    }

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
        return $this->belongsTo(Category::class,'category_id','id')->withTrashed();
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id')->withTrashed();
    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id','id')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function admarketing()
    {
        return $this->hasMany(AdMarketing::class, 'advertisement_id', 'id');
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
