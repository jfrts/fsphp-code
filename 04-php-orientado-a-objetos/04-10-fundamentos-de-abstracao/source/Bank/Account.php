<?php

namespace Source\Bank;

use Source\App\Trigger;
use Source\App\User;


/**
 * Class Account
 * @package Source\Bank
 */
abstract class Account
{
    protected int $branch;
    protected int $account;
    protected User $client;
    protected float $balance;

    /**
     * Account constructor.
     * @param int $branch
     * @param int $account
     * @param User $client
     * @param float $balance
     */
    protected function __construct(int $branch, int $account, User $client, float $balance)
    {
        $this->branch = $branch;
        $this->account = $account;
        $this->client = $client;
        $this->balance = $balance;
    }

    /**
     *
     */
    public function extract()
    {
        $extract = ($this->balance >= 1 ? Trigger::ACCEPT : Trigger::ERROR);
        Trigger::show("EXTRATO: Saldo atual: {$this->toBrl($this->balance)}", $extract);
    }

    /**
     * @param float $value
     * @return string
     */
    protected function toBrl(float $value) {
        return "R$ " . number_format($value, "2", ",", ".");
    }

    /**
     * @param float $value
     * @return mixed
     */
    abstract public function deposit(float $value);

    /**
     * @param float $value
     * @return mixed
     */
    abstract public function withdraw(float $value);
}