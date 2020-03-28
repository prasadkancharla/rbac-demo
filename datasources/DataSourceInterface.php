<?php
namespace datasources;

interface DataSourceInterface
{
    public function create($entityKey, $entity);

    public function update($entityKey, $entity);

    public function findById($entityKey, $id);

    public function find($entityKey, $filters);

    public function delete($entityKey, $filters);

    public function getAll($entityKey);

    public function updateAll($entityKey, $entities);

    public function deleteAll($entityKey, $entities);
}