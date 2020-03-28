<?php
namespace models;

use datasources\DataSourceFactory;

abstract class AbstractModel
{
    protected $id = -1;
    static $ds;

    function __construct($params = []) {
        //
    }

    public function getId()
    {
        return $this->id;
    }

    public function save() 
    {
        if ($this->id <= 0) {
            $this->id = self::$ds->create(get_class($this), $this);
        } else {
            self::$ds->update(get_class($this), $this);
        }
    }

    public function delete() 
    {
        // TODO:
    }

    public static function findById($id) 
    {
        return self::$ds->findById(get_called_class(), $id);
    }

    public static function find($filters) 
    {
        return self::$ds ->find(get_called_class(), $filters);
    }

    public static function getAll() 
    {
        // TODO:
    }

    public static function updateAll() 
    {
        // TODO:
    }

    public static function deleteAll() 
    {
        // TODO:
    }
}

AbstractModel::$ds = DataSourceFactory::get('memory');  // TODO: Ds type can come from config or environment variable