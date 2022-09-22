<?php

namespace Application\Model;

use DateTime;

/**
 * Customer data entity
 */
class Customer
{
    /**
     * @var ?int
     */
    private $customerId;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $surname;

    /**
     * @var ?DateTime
     */
    private $dateOfBirth;

    /**
     * @var ?Country
     */
    private $nationality;

    /**
     * @var string
     */
    private $password;

    /**
     * @var ?Account
     */
    private $account;

    /**
     * @return int|null
     */
    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    /**
     * @param int|null $customerId
     * @return Customer
     */
    public function setCustomerId(?int $customerId): Customer
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Customer
     */
    public function setFirstName(string $firstName): Customer
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     * @return Customer
     */
    public function setSurname(string $surname): Customer
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateOfBirth(): ?DateTime
    {
        return $this->dateOfBirth;
    }

    /**
     * @param DateTime|null $dateOfBirth
     * @return Customer
     */
    public function setDateOfBirth(?DateTime $dateOfBirth): Customer
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    /**
     * @return Country|null
     */
    public function getNationality(): ?Country
    {
        return $this->nationality;
    }

    /**
     * @param Country|null $nationality
     * @return Customer
     */
    public function setNationality(?Country $nationality): Customer
    {
        $this->nationality = $nationality;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return Customer
     */
    public function setPassword(string $password): Customer
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return Account|null
     */
    public function getAccount(): ?Account
    {
        return $this->account;
    }

    /**
     * @param Account|null $account
     * @return Customer
     */
    public function setAccount(?Account $account): Customer
    {
        $this->account = $account;
        return $this;
    }
}
