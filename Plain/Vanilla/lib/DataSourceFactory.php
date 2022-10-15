<?php
/**
 * A factory class to connect to a data source
 *
 * Date: 10/15/2022
 *
 * @author  Charles Brookover
 * @license MIT
 * @version 0.0.1
 */

namespace Local;

class DataSourceFactory
{

    private ?string $driver = null;

    public function __construct(string $driver)
    {
        $this->setDriver($driver);
    }

    public function setDriver(string $name)
    : void {
        $this->driver = $name;
    }

    public function connect(string $host, ?string $database, ?string $username, ?string $password)
    : \PDO {
        /**
         * @todo Add other data sources
         */
        $db = new \Local\DataSources\Sqlite();

        $db->setHost($host);
        $db->setDatabase($database);
        $db->setUserName($username);
        $db->setPassword($password);

        return $db->connect();
    }
}