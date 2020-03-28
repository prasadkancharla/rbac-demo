<?php

namespace models;

class Role extends AbstractModel {
    protected $name;

    /**
     * array of resources with action types 
     * or we can create a Permission type and this can hold array of permissions
     */
    protected $permissions;

    function __construct($params = []) 
    {
        $this->name = !empty($params["name"]) ? $params["name"]: "";
        $this->permissions = !empty($params["permissions"]) ? $params["permissions"]: [];

        parent::__construct();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPermissions()
    {
        return $this->permissions;
    }

    public function addPermission($permission)
    {
        $this->permissions[] = $permission;
    }

    public function removePermission($permission)
    {
        // TODO
    }
}
