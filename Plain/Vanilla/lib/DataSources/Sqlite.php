<?php
/**
 * Data Source class to connect to a Sqlite database
 *
 * Date: 10/15/2022
 *
 * @author  Charles Brookover
 * @license MIT
 * @version 0.0.1
 */

namespace Local\DataSources;

class Sqlite implements IDataSource
{
    private string $file;

    public function setHost(string $host)
    {
        $this->file = $host;
    }

    public function setDatabase(?string $database)
    {
        // TODO: Implement setUserName() method.
    }

    public function setUserName(?string $username)
    {
        // TODO: Implement setUserName() method.
    }

    public function setPassword(?string $password)
    {
        // TODO: Implement setPassword() method.
    }

    public function connect()
    : \PDO
    {
        $dsn = sprintf('sqlite:%s', $this->file);
        return new \PDO($dsn);
    }

}