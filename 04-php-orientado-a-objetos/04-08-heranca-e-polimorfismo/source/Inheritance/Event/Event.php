<?php

namespace Source\Inheritance\Event;

use DateTime;

class Event
{
    private string $event;
    private DateTime $date;
    private float $price;
    private array $register;
    protected $vacancies;

    /**
     * Event constructor.
     * @param string $event
     * @param DateTime $date
     * @param float $price
     * @param $vacancies
     */
    public function __construct(string $event, DateTime $date, float $price, $vacancies)
    {
        $this->event = $event;
        $this->date = $date;
        $this->price = $price;
        $this->vacancies = $vacancies;
    }

    /**
     * @param $fullName
     * @param $email
     */
    public function register($fullName, $email)
    {
        if ($this->vacancies >= 1) {
            $this->vacancies--;
            $this->setRegister($fullName, $email);
            echo "<p class='trigger accept'>Parabés, {$fullName}! Vaga garantida!</p>";
        } else {
            echo "<p class='trigger error'>Desculpe {$fullName}, mas as vagas esgotaram!</p>";
        }
    }

    /**
     * @param $fullName
     * @param $email
     */
    protected function setRegister($fullName, $email): void
    {
        $this->register = [
            "name" => $fullName,
            "email" => $email
        ];
    }

    /**
     * @return mixed
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date->format("d/m/Y H:i");
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return number_format($this->price, "2", ",", ".");
    }

    /**
     * @return mixed
     */
    public function getRegister()
    {
        return $this->register;
    }

    /**
     * @return mixed
     */
    public function getVacancies()
    {
        return $this->vacancies;
    }
}