<?php

namespace models;

class Resource extends AbstractModel {
    protected $name;

    function __construct($params = []) 
    {
        $this->name = !empty($params["name"]) ? $params["name"]: "";

        parent::__construct();
    }

    public function getName()
    {
        return $this->name;
    }
}
