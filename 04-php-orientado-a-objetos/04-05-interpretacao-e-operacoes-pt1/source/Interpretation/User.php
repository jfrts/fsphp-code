<?php

namespace Source\Interpretation;

class User
{
    private $fistName;
    private $lastName;
    private $email;

    /**
     * User constructor.
     * @param $fistName
     * @param $lastName
     * @param $email
     */
    public function __construct($fistName, $lastName, $email = null)
    {
        $this->fistName = $fistName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getFistName()
    {
        return $this->fistName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $fistName
     */
    public function setFistName($fistName)
    {
        $this->fistName = $fistName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @param mixed|null $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function __clone()
    {
        $this->fistName = null;
        $this->lastName = null;
        $this->email = null;
    }

    public function __destruct()
    {
        echo "<p class='trigger accept'>O objeto {$this->fistName} foi destruído!</p>";
        var_dump($this);
    }


}