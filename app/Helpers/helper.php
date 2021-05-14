<?php

use App\Models\City;
use App\Models\Country;

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
