<?php

namespace models;

class User extends AbstractModel {
    protected $name;
    protected $email;

    /**
     * Array of Role(s) 
     */
    protected $roles; 

    function __construct($params = []) 
    {
        $this->name = !empty($params["name"]) ? $params["name"]: "";
        $this->email = !empty($params["email"]) ? $params["email"]: "";
        $this->roles =!empty($params["roles"]) ? $params["roles"]: [];

        parent::__construct($params);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    function addRole(Role $role)
    {
        $this->roles[] = $role;
    }

    public function removeRole(Role $role)
    {
        $i = 0;
        foreach($this->roles as $r) {
            if ($r->id === $role->id) {
                array_splice($array, $i, 1);
                break;
            }
            $i++;
        }
    }
}
