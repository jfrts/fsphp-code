<?php

namespace Source\Contracts;

/**
 * Interface UserInterface
 * @package Source\Contracts
 */
interface UserInterface
{
    /**
     * UserInterface constructor.
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     */
    public function __construct(string $firstName, string $lastName, string $email);

    /**
     * @param string $email
     * @return mixed
     */
    public function setEmail(string $email);

    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @return string
     */
    public function getLastName();

    /**
     * @return string
     */
    public function getEmail();
}