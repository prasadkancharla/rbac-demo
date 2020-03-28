<?php
namespace services;

use models\Role;

class RoleService
{
    public static function addRole($params)
    {
        $role = new Role($params);
        $role->save();

        return $role;
    }

    public static function addPermission($roleId, $permission)
    {
        $role = Role::findById($roleId);
        $role->addPermission($permission);
        $role->save();
    }
}