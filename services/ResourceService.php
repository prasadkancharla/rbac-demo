<?php
namespace services;

use models\Resource;

class ResourceService
{
    public static function addResource($params)
    {
        $resource = new Resource($params);
        $resource->save();

        return $resource;
    }
}