<?php
namespace datasources;

class MemoryDataSource implements DataSourceInterface {
    static $data;
    static $autoIncrementIds = [];

    public function create($entityKey, $entity) 
    {
        $id = $this->getAutoIncrement($entityKey);
        $this->generateEntitySource($entityKey);
        self::$data[$entityKey][$id] = $entity;

        return $id;
        // TODO: persist data;
    }

    public function findById($entityKey, $id) 
    {
        if (isset(self::$data[$entityKey][$id])) {
            return self::$data[$entityKey][$id];
        } 

        throw new \Exception('Record not found');
    }

    public function update($entityKey, $entity) 
    {
        if (isset(self::$data[$entityKey][$entity->getId()])) {
            self::$data[$entityKey][$entity->getId()] = $entity;
             // TODO: persist data;
            return true;
        } 
       
        throw new \Exception('Record not found');
        
    }

    public function find($entityKey, $filters) 
    {
        // TODO
    }

    public function delete($entityKey, $filters) 
    {
        // TODO
    }

    public function getAll($entityKey) 
    {
        // TODO
    }

    public function updateAll($entityKey, $entities)
    {
        // TODO
    }

    public function deleteAll($entityKey, $entities)
    {
        // TODO
    }

    private function getAutoIncrement($entityKey) 
    {
        if (!isset(self::$autoIncrementIds[$entityKey])) {
            self::$autoIncrementIds[$entityKey] = 0;
        }
        return ++self::$autoIncrementIds[$entityKey];
    }

    private function generateEntitySource($entityKey) 
    {
        if (!isset(self::$data[$entityKey])) {
            self::$data[$entityKey] = [];
        }
    }
}