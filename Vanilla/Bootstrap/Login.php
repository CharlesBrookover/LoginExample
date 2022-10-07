<?php

namespace Local;

class Login
{
    /**
     * Login user
     *
     * @param string $email
     * @param string $password
     *
     * @return \Local\User|null
     */
    public function login(string $email, string $password)
    : User|null {
        if ($this->checkPassword($email, $password)) {
            $info = $this->getUserInfo($email);
            $user = new \Local\User();
            $user->setEmail($email);
            $user->setFirstName($info['firstName']);
            $user->setLastName($info['lastName']);
            $user->setCity($info['city']);
            $user->setAge($info['age']);

            return $user;
        }

        return null;
    }

    /**
     * Perform password check
     *
     * @param string $email
     * @param string $password
     *
     * @return bool
     */
    protected function checkPassword(string $email, string $password)
    : bool {
        return true;
    }

    protected function getUserInfo(string $email)
    : array {
        return [
            'firstName' => 'Charles',
            'lastName'  => 'Brookover',
            'city'      => 'Memphis',
            'age'       => 4,
        ];
    }
}

class User
{
    public string $email     = '';
    public string $firstName = '';
    public string $lastName  = '';
    public string $city      = '';
    public int    $age       = 0;

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


}