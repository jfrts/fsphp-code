<?php

namespace Source\Traits;

/**
 * Class Register
 * @package Source\Traits
 */
class Register
{
    use UserTrait;
    use AddressTrait;

    /**
     * Register constructor.
     * @param User $user
     * @param Address $address
     */
    public function __construct(User $user, Address $address)
    {
        $this->setUser($user);
        $this->setAddress($address);
        $this->save();
    }

    /**
     * @return void
     */
    private function save(): void
    {
        $this->user->id = 232;
        $this->address->user_id = $this->user->id;
    }
}