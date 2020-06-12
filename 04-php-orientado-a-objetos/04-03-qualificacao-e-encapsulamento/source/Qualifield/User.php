<?php

namespace Source\Qualifield;

/**
 * Class User
 */
class User
{
    private $firstName;
    private $lastName;
    private $email;

    private $error;

    /**
     * @param $fistName
     * @param $lastName
     * @param $email
     * @return bool
     */
    public function setUser($fistName, $lastName, $email)
    {
        $this->setFirstName($fistName);
        $this->setLastName($lastName);

        if (!$this->setEmail($email)) {
            $this->error = "O e-mail {$this->getEmail()} não é válido!";
            return false;
        }

        return true;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    private function setFirstName($firstName)
    {
        $this->firstName = filter_var($firstName, FILTER_SANITIZE_STRIPPED);
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    private function setLastName($lastName)
    {
        $this->lastName = filter_var($lastName, FILTER_SANITIZE_STRIPPED);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return bool
     */
    private function setEmail($email)
    {
        $this->email = $email;

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
}