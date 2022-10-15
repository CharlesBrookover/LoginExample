<?php
/**
 * A new PHP page
 *
 * Date: 10/15/2022
 *
 * @author  Charles Brookover
 * @license MIT
 * @version 0.0.1
 */


namespace LocalTests;

use Local\DataSourceFactory;
use PHPUnit\Framework\TestCase;

define('BASE_PATH', dirname(__FILE__));

final class DataSourceFactoryTest extends TestCase
{

    /**
     * @dataProvider datasourceConfig
     */
    public function testConnect(string $driver, string $host, ?string $database, ?string $username, ?string $password)
    {
        $dsFactory = new DataSourceFactory($driver);
        $pdo       = $dsFactory->connect($host, $database, $username, $password);

        $this->assertIsObject($pdo);
        $this->assertInstanceOf('PDO', $pdo);
        $this->assertSame($driver, $pdo->getAttribute(\PDO::ATTR_DRIVER_NAME));
    }

    public function datasourceConfig()
    : array
    {
        return [
            ['sqlite', BASE_PATH . '/../data/login.db', null, null, null],
        ];
    }
}
