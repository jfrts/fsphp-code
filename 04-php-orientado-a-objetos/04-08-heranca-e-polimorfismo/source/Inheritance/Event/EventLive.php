<?php

namespace Source\Inheritance\Event;

use DateTime;
use Source\Inheritance\Address;

class EventLive extends Event
{
    private Address $address;

    /**
     * EventLive constructor.
     * @param $event
     * @param DateTime $date
     * @param $price
     * @param $vacancies
     * @param Address $address
     */
    public function __construct($event, DateTime $date, $price, $vacancies, Address $address)
    {
        parent::__construct($event, $date, $price, $vacancies);
        $this->address = $address;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }
}