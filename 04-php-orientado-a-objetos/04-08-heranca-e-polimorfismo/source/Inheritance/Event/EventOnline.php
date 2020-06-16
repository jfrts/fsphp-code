<?php

namespace Source\Inheritance\Event;

use DateTime;

/**
 * Class EventOnline
 * @package Source\Inheritance\Event
 */
class EventOnline extends Event
{
    private string $link;

    /**
     * EventOnline constructor.
     * @param string $event
     * @param DateTime $date
     * @param float $price
     * @param string $link
     * @param int|null $vacancies
     */
    public function __construct(string $event, DateTime $date, float $price, string $link, $vacancies = null)
    {
        parent::__construct($event, $date, $price, $vacancies);
        $this->link = $link;
    }

    public function register($fullName, $email)
    {
        $this->vacancies++;
        $this->setRegister($fullName, $email);

        echo "<p class='trigger accept'>Show {$fullName}, cadastrado com sucesso!</p>";
    }


}