<?php

namespace App\Libs\Traits;

use App\Permission;
use App\Role;

trait RefreshRolePermission
{
    protected function refreshRolePermission()
    {
        $permissionArr = [];
        foreach (config('rolepermission.permissions') as $key => $permissionConfig) {
            $permissionArr[$key] = Permission::create([
                'name' => $permissionConfig['name'],
                'label' => $permissionConfig['label'],
            ]);
        }

        foreach (config('rolepermission.roles') as $roleConfig) {
            $role = Role::create([
                'name' => $roleConfig['name'],
                'label' => $roleConfig['label'],
            ]);

            foreach ($roleConfig['permissions'] as $permission) {
                $role->givePermissionTo($permissionArr[$permission]);
            }
        }
    }
}
