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


namespace Tests\db;

use Local\DataSourceFactory;
use PHPUnit\Framework\TestCase;

define('BASE_PATH', dirname(__FILE__));

final class DataSourceFactoryTest extends TestCase
{

    private static string $dbFile;

    public static function setUpBeforeClass()
    : void
    {
        parent::setUpBeforeClass();

        require_once TEST_ROOT . "/data.php";

        self::$dbFile = TEST_DB;
        createTestDb();
    }


    /**
     * @dataProvider datasourceConfig
     */
    public function testConnect(string $driver, string $host, ?string $database, ?string $username, ?string $password)
    {
        $dsFactory = new DataSourceFactory($driver, $host, $database, $username, $password);

        $this->assertIsObject($dsFactory);
        $this->assertInstanceOf($dsFactory::class, $dsFactory);
    }

    public function datasourceConfig()
    : array
    {
        return [
            ['sqlite', self::$dbFile, null, null, null],
        ];
    }
}
