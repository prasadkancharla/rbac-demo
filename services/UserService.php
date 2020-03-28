<?php
namespace services;

use models\Resource;
use models\User;
use models\Role;

class UserService
{
    public static function addUser($params)
    {
        $user = new User($params);
        $user->save();

        return $user;
    }

    public static function addUserRole($userId, $roleId)
    {
        $user = User::findById($userId);
        $role = Role::findById($roleId);

        $user->addRole($role);
        $user->save();
    }

    public  static function canUserPerform($userId, $resourceId, $actionType)
    {
        $user = User::findById($userId);
        $roles = $user->getRoles();

        foreach ($roles as $role) {
            $permissions = $role->getPermissions();

            foreach ($permissions as $permission) {
                if ($permission["resource"]->getId() == $resourceId && $permission["action_type"] == $actionType) {
                    return true;
                }
            }
        }

        return false;
    }

    public static function removeUserRole($userId, $roleId)
    {
        // TODO;
    }
}