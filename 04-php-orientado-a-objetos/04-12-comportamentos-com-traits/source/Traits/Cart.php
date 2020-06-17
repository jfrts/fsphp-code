<?php

namespace Source\Traits;

/**
 * Class Cart
 * @package Source\Traits
 */
class Cart
{
    use UserTrait;
    use AddressTrait;

    /**
     * @var array
     */
    private array $products;
    /**
     * @var float|int
     */
    private float $cart = 0;

    /**
     * @param int $id
     * @param string $product
     * @param int $amount
     * @param float $price
     * @return void
     */
    public function add(int $id, string $product, int $amount, float $price): void
    {
        $this->products[$id] = [
            "product" => $product,
            "amount" => $amount,
            "price" => $price,
            "total" => $amount * $price
        ];

        $this->cart += $amount * $price;
    }

    /**
     * @param int $id
     * @param int $amount
     */
    public function remove(int $id, int $amount): void
    {
        $this->cart -= $amount * $this->products[$id]["price"];

        if ($this->products[$id]["amount"] > $amount) {
            $this->products[$id]["amount"] -= $amount;
            $this->products[$id]["total"] = $this->products[$id]["amount"] * $this->products[$id]["price"];
        } else {
            unset($this->products[$id]);
        }
    }

    /**
     * @param User $user
     * @param Address $address
     */
    public function checkout(User $user, Address $address): void
    {
        $this->setUser($user);
        $this->setAddress($address);
    }
}