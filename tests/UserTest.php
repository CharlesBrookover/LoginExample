<?php

declare(strict_types=1);
/**
 * A new PHP page
 *
 * Date: 10/16/2022
 *
 * @author  Charles Brookover
 * @license MIT
 * @version 0.0.1
 */

namespace LocalTests;

use Local\Models\Users;
use Local\User;
use PHPUnit\Framework\TestCase;
use Tests\Bootstrap\CreateSqlite;

final class UserTest extends TestCase
{

    private static \SQLite3|null $SQLite3;
    private static array         $baseData;

    private User $user;

    public static function setUpBeforeClass()
    : void
    {
        parent::setUpBeforeClass();

        $createObj      = new CreateSqlite();
        self::$SQLite3  = $createObj->getSQLite3();
        self::$baseData = $createObj->getBaseData();
    }


    public static function tearDownAfterClass()
    : void
    {
        parent::tearDownAfterClass();
        self::$SQLite3->close();
        self::$SQLite3 = null;
    }

    protected function setUp()
    : void
    {
        parent::setUp();

        $this->user = new User(['driver' => 'sqlite', 'host' => CreateSqlite::$dbFile]);
    }

    /**
     * @dataProvider userData
     */
    public function testLogin(string $email, string $password)
    {
        $returned = $this->user->login($email, $password);

        $this->assertInstanceOf(Users::class, $returned);
        foreach (self::$baseData as $item => $data) {
            if ($item === 'password') {
                continue;
            }
            $getter = sprintf('get%s', ucfirst($item));
            $this->assertSame($returned->$getter(), $data);
        }
    }

    public function userData()
    {
        return [
            ['me@me.com', '123456'],
        ];
    }
}
