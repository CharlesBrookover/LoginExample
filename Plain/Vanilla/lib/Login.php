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

class Login
{
    private \PDO $conn;

    private string $dsDriver = 'sqlite';
    private string $dsFile   = ROOT_PATH . '/data/login.db.db';

    public function __construct()
    {
        $dsFactory  = new DataSourceFactory($this->dsDriver);
        $this->conn = $dsFactory->connect($this->dsFile, null, null, null);
    }

    public function login(string $email, string $password)
    : null|UserInfo {
        if ($this->checkLogin($email, $password)) {
            return $this->getUserInfo($email);
        }

        return null;
    }

    protected function checkLogin(string $email, string $password)
    : bool {
        $hashedPassword = hash('sha512', $password);
        $stmt           = $this->conn->prepare('select * from users where email = ? and password = ? limit 1');
        $stmt->execute([$email, $hashedPassword]);
        $count = $stmt->rowCount();

        return $count > 0;
    }

    protected function getUserInfo(string $email)
    : null|UserInfo {
        $stmt = $this->conn->prepare('select * from users where email = ? limit 1');
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $userInfo = $stmt->fetchObject('UserInfo');
            return $userInfo ?: null;
        }

        return null;
    }
}

class UserInfo
{
    protected string $email;
    protected string $firstName;
    protected string $lastName;
    protected string $city;
    protected int    $age;
    protected int    $inserted;
    protected int    $updated;

    /**
     * @return string
     */
    public function getEmail()
    : string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    : void {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFirstName()
    : string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    : void {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    : string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName)
    : void {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getCity()
    : string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city)
    : void {
        $this->city = $city;
    }

    /**
     * @return int
     */
    public function getAge()
    : int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age)
    : void {
        $this->age = $age;
    }

    /**
     * @return int
     */
    public function getInserted()
    : int
    {
        return $this->inserted;
    }

    /**
     * @param int $inserted
     */
    public function setInserted(int $inserted)
    : void {
        $this->inserted = $inserted;
    }

    /**
     * @return int
     */
    public function getUpdated()
    : int
    {
        return $this->updated;
    }

    /**
     * @param int $updated
     */
    public function setUpdated(int $updated)
    : void {
        $this->updated = $updated;
    }

}