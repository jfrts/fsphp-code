<?php

namespace Source\Traits;

/**
 * Class Address
 * @package Source\Traits
 */
class Address
{
    private string $street;
    private int $number;
    private string $complement;
    public int $user_id;

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
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getComplement(): string
    {
        return $this->complement;
    }
}