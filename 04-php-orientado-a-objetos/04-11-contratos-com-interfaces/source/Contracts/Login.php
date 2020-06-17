<?php

namespace Source\Contracts;

/**
 * Class Login
 * @package Source\Contracts
 */
class Login
{
    private UserInterface $logged;

    /**
     * @param User $user
     * @return User
     */
    public function loginUser(User $user): User
    {
        $this->logged = $user;
        return $this->logged;
    }

    /**
     * @param UserAdmin $user
     * @return User|UserAdmin
     */
    public function loginAdmin(UserAdmin $user): UserAdmin
    {
        $this->logged = $user;
        return $this->logged;
    }

    /**
     * @param UserInterface $user
     * @return UserInterface
     */
    public function login(UserInterface $user): UserInterface
    {
        $this->logged = $user;
        return $this->logged;
    }
}