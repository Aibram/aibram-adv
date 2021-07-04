<?php

use App\Facades\RandomCode;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\UserRating;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

if (!function_exists('isJson')) {

    /**
     * @param $string
     * @return bool
     */
    function isJson($string): bool
    {
        dd($string);
        json_decode($string, true);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}

if (!function_exists('toSqlBindings')) {

    /**
     * @param $query
     * @return string
     */
    function toSqlBindings($query): string
    {
        return vsprintf(str_replace('?', '%s', str_replace('?', "'?'", $query->toSql())), $query->getBindings());
    }
}

if (!function_exists('getCities')) {

    /**
     * @param $query
     * @return string
     */
    function getCities($id,$status=1)
    {
        return City::active($status)->where(['country_id'=>$id])->get();
    }
}

if (!function_exists('getfirstCountry')) {

    /**
     * @param $query
     * @return string
     */
    function getfirstCountry($status=1)
    {
        return Country::active($status)->first();
    }
}

if (!function_exists('getCitiesOfYemen')) {

    /**
     * @param $query
     * @return string
     */
    function getCitiesOfYemen()
    {
        return Country::where(['ext'=>'967'])->first()->city;
    }
}

if (!function_exists('getFullLink')) {

    /**
     * @param $query
     * @return string
     */
    function getFullLink($to, array $params = [], array $additional = []) {
        return Str::finish(url($to, $additional), '?') . Arr::query($params);
    }
}

if (!function_exists('allCountries')) {

    /**
     * @param $query
     * @return string
     */
    function allCountries($status=1)
    {
        return Country::active($status)->get();
    }
}
if (!function_exists('toWhatsappGateway')) {

    /**
     * @param $query
     * @return string
     */
    function toWhatsappGateway($mobile)
    {
        return 'https://api.whatsapp.com/send?phone='.$mobile;
    }
}

if (!function_exists('allUsers')) {

    /**
     * @param $query
     * @return string
     */
    function allUsers($status=1)
    {
        return User::active($status)->get();
    }
}

if (!function_exists('getAds')) {

    /**
     * @param $query
     * @return string
     */
    function getAds($where,$exceptId=null,$take=5,$orderBy="created_at",$orderDirection="desc")
    {
        $advs = Advertisement::active(1)->where($where);
        if($exceptId){
            $advs->where('id','<>',$exceptId);
        }
        $advs->orderBy($orderBy,$orderDirection);
        return $advs->take($take)->get()->map->format();
    }
}

if (!function_exists('getFeaturedAds')) {

    /**
     * @param $query
     * @return string
     */
    function getFeaturedAds($user,$take=5,$orderBy="created_at",$orderDirection="desc")
    {
        if(is_null($user)){
            return [];
        }
        $advs = Advertisement::active(1)
                ->join('ad_marketings', function ($q) {
                    $q->on('ad_marketings.advertisement_id', '=', 'advertisements.id');
                })
                ->where(function ($query) use($user){
                    $query->where('ad_marketings.gender', '=', $user->gender)
                          ->orWhere('ad_marketings.gender', '=', 'all');
                })
                ->where(function ($query) use($user){
                    $query->where('ad_marketings.age_from', '>=', $user->age)
                          ->orWhere('ad_marketings.age_to', '<=', $user->age);
                })
                ->where(['advertisements.featured' => 1,'ad_marketings.city_id'=>$user->city_id])
                ->groupBy('advertisements.id')
                ->orderBy($orderBy,$orderDirection)
                ->select(
                    [
                        'advertisements.*',
                    ]
                );
        return $advs->take($take)->get()->map->format();
    }
}

if (!function_exists('allCategories')) {

    /**
     * @param $query
     * @return string
     */
    function allCategories($isParent=true)
    {
        return Category::active(1)->myparent($isParent)->get();
    }
}

if (!function_exists('categoriesFilter')) {

    /**
     * @param $query
     * @return string
     */
    function categoriesFilter($parentId=null)
    {
        return Category::active(1)->where(['parent_id'=>$parentId])->get();
    }
}

if (!function_exists('categoriesByLevels')) {

    /**
     * @param $query
     * @return string
     */
    function categoriesByLevels($parentIds=[])
    {
        $cats = Category::active(1);
        if(count($parentIds))
            $cats = $cats->whereIn('parent_id',$parentIds);
        else
            $cats = $cats->where('parent_id',null);
        $cats = $cats->get();
        return [
            'cats' => $cats,
            'ids' => $cats->map(fn($category, $key) => $category->id)
        ];
    }
}
if (!function_exists('getTestimonials')) {

    /**
     * @param $query
     * @return string
     */
    function getTestimonials()
    {
        return Testimonial::active(1)->get();
    }
}
if (!function_exists('getInputTypes')) {

    /**
     * @param $query
     * @return string
     */
    function getInputTypes()
    {
        return [
            'text' => __('base.input.text'),
            'textarea' => __('base.input.textarea'),
            'select' => __('base.input.select'),
            'checkbox' => __('base.input.checkbox'),
            'radio' => __('base.input.radio'),
        ];
    }
}
if (!function_exists('getSettings')) {

    /**
     * @param $query
     * @return string
     */
    function getSettings($key,$default='')
    {
        $setting = Setting::where('key',$key)->first();
        return $setting ? $setting->value : $default ;
    }
}
if (!function_exists('ratedBefore')) {

    /**
     * @param $query
     * @return string
     */
    function ratedBefore($user,$ratedUserId)
    {
        return $user?UserRating::where(['user_id'=>$user->id,'rated_user_id'=>$ratedUserId])->count() > 0 : true;
    }
}

if (!function_exists('favoritedBefore')) {

    /**
     * @param $query
     * @return string
     */
    function favoritedBefore($user,$ad)
    {
        return $user?$ad->userFavoriteList()->where(['user_id'=>$user->id])->count() > 0 : true;
    }
}

if (!function_exists('getCount')) {

    /**
     * @param $query
     * @return string
     */
    function getCount($filters,$model)
    {
        $count = $model;
        if(isset($filters['from_date'])){
            $count = $count->whereRaw('created_at >= ?',[$filters['from_date']." 00:00:00"]);
        }
        if(isset($filters['to_date'])){
            $count = $count->whereRaw('created_at <= ?',[$filters['to_date']." 23:59:59"]);
        }
        return $count->count();
    }
}

if (!function_exists('getGenderTypes')) {

    function getGenderTypes()
    {
        return [
            'm' => __('pages.users.male'),
            'f' => __('pages.users.female')
        ];
    }
}
if (!function_exists('checkOnline')) {

    function checkOnline($id)
    {
        return Cache::has('user-is-online-' . $id);
    }
}

if (!function_exists('checkLoggedIn')) {

    function checkLoggedIn($guard)
    {
        return auth()->guard($guard)->check();
    }
}

if (!function_exists('currUser')) {

    function currUser($guard)
    {
        return auth()->guard($guard)->user();
    }
}
if (!function_exists('generateAdUniqueId')) {

    function generateAdUniqueId($length=7) {
        $number = RandomCode::getCode($length);

        if (checkUserIdExists($number)) {
            return generateAdUniqueId($length);
        }
        return $number;
    }
}
if (!function_exists('checkUserIdExists')) {

    function checkUserIdExists($number) {
        return Advertisement::where(['uid'=>$number])->exists();
    }
}

if (!function_exists('getAdSingle')) {

    function getAdSingle($id) {
        return Advertisement::find($id);
    }
}


if (!function_exists('getAvailStatuses')) {
    
    function getAvailStatuses()
    {
        return [
            [
                'text' => __('base.deactivated'),
                'badge' => 'danger'
            ],
            [
                'text' => __('base.activated'),
                'badge' => 'success'
            ],
            [
                'text' => __('base.completed'),
                'badge' => 'info'
            ]
        ];
    }
}

if (!function_exists('getUserStatuses')) {
    
    function getUserStatuses()
    {
        return [
            [
                'text' => __('base.user_banned'),
                'badge' => 'danger'
            ],
            [
                'text' => __('base.user_unbanned'),
                'badge' => 'success'
            ],
        ];
    }
}
if (!function_exists('getContactUsStatuses')) {
    
    function getContactUsStatuses()
    {
        return [
            [
                'text' => __('base.not_contacted'),
                'badge' => 'danger'
            ],
            [
                'text' => __('base.contacted'),
                'badge' => 'success'
            ],
        ];
    }
}

if (!function_exists('getContactUsDevices')) {
    
    function getContactUsDevices()
    {
        return [
            'web' => [
                'text' => __('base.web'),
                'badge' => 'info'
            ],
            'android' => [
                'text' => __('base.android'),
                'badge' => 'success'
            ],
            'ios' => [
                'text' => __('base.ios'),
                'badge' => 'warning'
            ],
        ];
    }
}

if (!function_exists('getPermissions')) {

    /**
     * @param $query
     * @return string
     */
    function getPermissions()
    {
        $appPermissionsFile = config('app-permissions');
        $policies =  $appPermissionsFile['policies'];
        $permissions = $appPermissionsFile['crud_permissions'];
        $standalone_permissions = $appPermissionsFile['standalone_permissions'];
        $returnedPermissions = [];
        foreach($permissions as $index => $permissionItem){
            array_push($returnedPermissions,[
                "name" => $permissionItem,
                "children" => []
            ]);
            foreach($policies as $policyItem){
                array_push($returnedPermissions[$index]['children'],$policyItem);
            }
        }
        $index = count($permissions);
        foreach($standalone_permissions as $permissionItem => $policies){
            array_push($returnedPermissions,[
                "name" => $permissionItem,
                "children" => []
            ]);
            foreach($policies as $policyItem){
                array_push($returnedPermissions[$index]['children'],$policyItem);
            }
            $index++;
        }
        return $returnedPermissions;
    }
}