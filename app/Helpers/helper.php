<?php

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\User;

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
        return $advs->take(5)->get();
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

if (!function_exists('ratedBefore')) {

    /**
     * @param $query
     * @return string
     */
    function ratedBefore($user,$ad)
    {
        return $user?$ad->ratedUsers()->where(['user_id'=>$user->id])->count() > 0 : true;
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