<?php
namespace datasources;

use datasources\MemoryDataSource;

class DataSourceFactory
{
    static function get($ds) 
    {
        switch ($ds) {
            case 'memory':
                return new MemoryDataSource();
        }

        throw new \Exception("Invalid Data Source");
    }
}