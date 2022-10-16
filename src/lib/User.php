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

namespace Local;

use Local\Entities\Users;

class User
{
    private \PDO $conn;

    public function __construct(array $options)
    {
        try {
            $dsFactory  = new DataSourceFactory($options['driver']);
            $this->conn = $dsFactory->connect($options['host'] ?? '', $options['database'] ?? null, $options['username'] ?? null, $options['password'] ?? null);
        } catch (\Throwable $e) {
            printf("Something Bad: %s", $e->getMessage());
            return null;
        }
    }

    public function login(string $email, string $password)
    : null|Users {
        if ($this->checkLogin($email, $password)) {
            return $this->getUserInfo($email);
        }

        return null;
    }

    protected function checkLogin(string $email, string $password)
    : bool {
        $stmt = $this->conn->prepare('select email from users where email = ? and password = ? limit 1');
        $stmt->execute([$email, $this->hashPassword($password)]);
        $count = $stmt->rowCount();

        return $count > 0;
    }

    protected function getUserInfo(string $email)
    : null|Users {
        $stmt = $this->conn->prepare('select * from users where email = ? limit 1');
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $userInfo = $stmt->fetchObject(Users::class);
            return $userInfo ?: null;
        }

        return null;
    }

    private function hashPassword(string $password)
    : string {
        return hash('sha512', $password);
    }
}
