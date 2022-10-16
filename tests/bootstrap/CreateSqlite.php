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

namespace Tests\Bootstrap;

class CreateSqlite
{

    private \SQLite3     $SQLite3;
    public static string $dbFile = '/tmp/testLogin.db';

    private array $baseData = [
        'users' => [
            ['email' => 'me@me.com', 'password' => '12345', 'firstName' => 'Me', 'lastName' => 'One', 'city' => 'SomeTown', 'age' => 1],
        ],
    ];

    private string $createTable = /** @lang SQLite */
        <<<SQL
create table users
(
    email     TEXT not null,
    firstName TEXT,
    lastName  TEXT,
    city      TEXT,
    age       INTEGER,
    inserted  INTEGER default CURRENT_TIMESTAMP,
    updated   INTEGER,
    password  TEXT not null
);

create unique index email_index
    on users (email);


SQL;

    private string $insertUsers = /** @lang SQLite */
        <<<SQL
 insert into users (email, firstName, lastName, city, age, password) 
 values (:email, :firstName, :lastName, :city, :age, :password)
SQL;


    public function __construct()
    {
        $this->createDb();
    }

    public function __destruct()
    {
        unlink(self::$dbFile);
        printf("DESTRUCT!!!!");
    }

    /**
     * @return \SQLite3
     */
    public function getSQLite3()
    : \SQLite3
    {
        return $this->SQLite3;
    }

    /**
     * @return array
     */
    public function getBaseData()
    : array
    {
        return $this->baseData;
    }


    public function createDb()
    {
        $this->SQLite3 = new \SQLite3(self::$dbFile);
        $this->createUserTable();
    }

    protected function createUserTable()
    {
        $this->SQLite3->exec($this->createTable);

        $stmt = $this->SQLite3->prepare($this->insertUsers);
        foreach ($this->baseData['users'] as $row) {
            $stmt->bindParam('email', $row['email']);
            $stmt->bindParam('firstName', $row['firstName']);
            $stmt->bindParam('lastName', $row['lastName']);
            $stmt->bindParam('city', $row['city']);
            $stmt->bindParam('age', $row['age'], SQLITE3_INTEGER);
            $hashedPassword = Helpers::hashString($row['password']);
            $stmt->bindParam('password', $hashedPassword);

            $stmt->execute();
        }
    }
}