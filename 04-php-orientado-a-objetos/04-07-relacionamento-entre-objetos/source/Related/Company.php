<?php

namespace Source\Related;

/**
 * Class Company
 * @package Source\Related
 */
class Company
{

    /**
     * @var Address
     */
    private $address;

    private $company;
    private $team;
    private $products;

    /**
     * @param $company
     * @param $address
     */
    public function bootCompany($company, $address)
    {
        $this->company = $company;
        $this->address = $address;
    }

    /**
     * @param $company
     * @param Address $address
     */
    public function boot($company, Address $address)
    {
        $this->company = $company;
        $this->address = $address;
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    /**
     * @param $job
     * @param $firstName
     * @param $lastName
     */
    public function addTeamMember($job, $firstName, $lastName)
    {
        $this->team[] = new User($job, $firstName, $lastName);
    }
    
    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @return User[]
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }
}