<?php

namespace App\Manager;

class User
{
    private $username, $password, $email;

    public function register(array $data): void
    {
        // validate email
        $this->email = strtolower($data['email']);
        $this->username = strtolower($data['username']);
        $this->password = password_hash($data['password'], PASSWORD_BCRYPT);
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        // validate email
        $this->email = strtolower($email);
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }
}


