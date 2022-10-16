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

define('TEST_ROOT', dirname(__FILE__));


$createSql = file_get_contents(TEST_ROOT . '/../sql/database.sql');
define('CREATE_SQL', $createSql);
const BASE_USER_DATA = [
    ['email' => 'me@me.com', 'firstName' => 'Me', 'lastName' => 'One', 'city' => 'SomeTown', 'age' => 1],
];

define("BASE_USER_AUTH_DATA", [
    ['email' => 'me@me.com', 'password' => hash('sha512', '123456')],
]);
const TEST_DB               = '/tmp/testLogin.db';
const BASE_USER_INSERT      = 'insert into users (email, firstName, lastName, city, age) values(:email, :firstName, :lastName, :city, :age )';
const BASE_USER_AUTH_INSERT = 'insert into users_auth (email, password) values (:email, :password)';


function createTestDb()
: void
{
    $db = new \SQLite3(TEST_DB);
    $db->exec(CREATE_SQL);

    $stmt = $db->prepare(BASE_USER_INSERT);
    foreach (BASE_USER_DATA as $row) {
        foreach ($row as $item => $value) {
            $placeholder = sprintf(':%s', $item);
            $stmt->bindParam($placeholder, $value);
        }
        $stmt->execute();
    }

    $stmt = $db->prepare(BASE_USER_AUTH_INSERT);
    foreach (BASE_USER_AUTH_DATA as $row) {
        foreach ($row as $item => $value) {
            $placeholder = sprintf(':%s', $item);
            $stmt->bindParam($placeholder, $value);
        }
        $stmt->execute();
    }
}