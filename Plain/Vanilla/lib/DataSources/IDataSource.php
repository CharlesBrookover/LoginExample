<?php
/**
 * Interface for all Data Sources that will be use to connect
 *
 * Date: 10/15/2022
 *
 * @author  Charles Brookover
 * @license MIT
 * @version 0.0.1
 */

namespace Local\DataSources;

interface IDataSource
{
    public function setHost(string $host);

    public function setDatabase(string $database);

    public function setUserName(string $username);

    public function setPassword(string $password);

    public function connect()
    : \PDO;
}