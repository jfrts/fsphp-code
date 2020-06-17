<?php

namespace Source\Contracts;

class UserAdmin extends User implements UserInterface, UserErrorInterface
{
    private int $level;
    private $error;

    public function __construct(string $firstName, string $lastName, string $email)
    {
        parent::__construct($firstName, $lastName, $email);
        $this->level = 10;
    }

    /**
     * @param mixed $error
     */
    public function setError($error): void
    {
        $this->error = $error;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }


}