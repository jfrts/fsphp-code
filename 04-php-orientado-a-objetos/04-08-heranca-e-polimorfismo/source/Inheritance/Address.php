<?php

namespace Source\Inheritance;

class Address
{
    private string $street;
    private int $number;
    private string $complement;

    /**
     * Address constructor.
     * @param string $street
     * @param int $number
     * @param string $complement
     */
    public function __construct(string $street, int $number, string $complement)
    {
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getComplement()
    {
        return $this->complement;
    }
}