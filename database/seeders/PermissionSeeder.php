<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appPermissionsFile = config('app-permissions');
        $policies =  $appPermissionsFile['policies'];
        $permissions = $appPermissionsFile['crud_permissions'];
        $standalone_permissions = $appPermissionsFile['standalone_permissions'];
        foreach($policies as $policyItem){
            foreach($permissions as $permissionItem){
                Permission::create(['guard_name' => 'admin', 'name' => $permissionItem.'.'.$policyItem]);
            }
        }
        foreach($standalone_permissions as $permissionItem => $policies){
            foreach($policies as $policyItem){
                Permission::create(['guard_name' => 'admin', 'name' => $permissionItem.'.'.$policyItem]);
            }
        }
    }
}
