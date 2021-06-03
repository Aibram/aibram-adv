<?php

namespace App\Models;

use App\Models\BaseModels\Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'name'
        ,'mobile'
        ,'ext'
        ,'country_id'
        ,'city_id'
        ,'age'
        ,'gender'
        ,'activated'
        ,'activated_at'
        ,'status'
        ,'no_ads'
        ,'no_chats'
        ,'no_ratings'
        ,'no_favorites'
        ,'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function registerMediaGroups()
    {
        $this->addMediaGroup($this->mainImageCollection)
             ->performConversions('user_thumb');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Illuminate\Support\Facades\Hash::make($value);
    }

    public function getFullPhoneAttribute()
    {
        return $this->ext.$this->mobile;
    }
    
    public function userComments(){
        return $this
            ->belongsToMany(Advertisement::class, 'ad_comments', 'advertisement_id', 'user_id')
            ->withPivot(['comment','parent_id'])
            ->withTimestamps();
    }
    public function advertisements()
    {
        return $this->hasMany(Advertisement::class, 'user_id', 'id');
    }

    public function codes()
    {
        return $this->hasMany(ActivationCode::class, 'user_id', 'id');
    }
    public function city()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }
    public function sentMessages()
    {
        return $this->hasMany(ChatConversation::class, 'sender_id', 'id');
    }
    public function receivedMessages()
    {
        return $this->hasMany(ChatConversation::class, 'receiver_id', 'id');
    }
    public function advsFavoriteList(){
        return $this
            ->belongsToMany(Advertisement::class, 'favorite_items', 'advertisement_id', 'user_id')
            // ->withPivot(['price','notes','accepted'])
            ->withTimestamps();
    }
    public function visitedAdvs(){
        return $this
            ->belongsToMany(Advertisement::class, 'user_visits', 'advertisement_id', 'user_id')
            // ->withPivot(['price','notes','accepted'])
            ->withTimestamps();
    }
    public function reportedAdvs(){
        return $this
            ->belongsToMany(Advertisement::class, 'user_reports', 'advertisement_id', 'user_id')
            ->withPivot(['reason'])
            ->withTimestamps();
    }
    public function ratedAdvs(){
        return $this
            ->belongsToMany(Advertisement::class, 'user_ratings', 'user_id', 'advertisement_id')
            ->withPivot(['rated_user_id','stars','comment'])
            ->withTimestamps();
    }
}
