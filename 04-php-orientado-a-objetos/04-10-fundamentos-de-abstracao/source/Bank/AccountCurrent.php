<?php

namespace Source\Bank;

use Source\App\Trigger;
use Source\App\User;

/**
 * Class AccountCurrent
 * @package Source\Bank
 */
class AccountCurrent extends Account
{
    private float $limit;

    /**
     * AccountCurrent constructor.
     * @param int $branch
     * @param int $account
     * @param User $client
     * @param float $balance
     * @param float $limit
     */
    public function __construct(int $branch, int $account, User $client, float $balance, float $limit)
    {
        parent::__construct($branch, $account, $client, $balance);
        $this->limit = $limit;
    }

    /**
     * @param float $value
     * @return void
     */
    public function deposit(float $value)
    {
        $this->balance += $value;
        Trigger::show("Depósito de {$this->toBrl($value)} efetuado com sucesso!", Trigger::ACCEPT);
    }

    /**
     * @param float $value
     * @return void
     */
    final public function withdraw(float $value)
    {
        if ($value <= $this->balance + $this->limit) {
            $this->balance -= abs($value);
            Trigger::show("Saque de {$this->toBrl($value)} efetuado com sucesso!", Trigger::ERROR);

            if ($this->balance < 0) {
                $tax = abs($this->balance * 0.006);
                $this->balance -= $tax;

                Trigger::show("Taxa de uso de limite: {$this->toBrl($tax)}", Trigger::WARNING);
            }

        } else {
            $saving = $this->balance + $this->limit;
            Trigger::show("Saldo insuficiente, você tem {$this->toBrl($saving)}", Trigger::ERROR);
        }
    }
}