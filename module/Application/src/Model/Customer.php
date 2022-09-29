<?php

namespace Application\Model;

use Application\Util\Util;

/**
 * Customer data entity
 */
class Customer
{
    /**
     * First names data
     *
     * @var array
     */
    const FIRST_NAME_DATA = [
        'James',
        'Robert',
        'John',
        'Michael',
        'David',
        'William',
        'Richard',
        'Joseph',
        'Thomas',
        'Charles',
        'Christopher',
        'Daniel',
        'Matthew',
        'Anthony',
        'Mark',
        'Donald',
        'Steven',
        'Paul',
        'Andrew',
        'Joshua',
        'Mary',
        'Patricia',
        'Jennifer',
        'Linda',
        'Elizabeth',
        'Barbara',
        'Susan',
        'Jessica',
        'Sarah',
        'Karen',
        'Lisa',
        'Nancy',
        'Betty',
        'Margaret',
        'Sandra',
        'Ashley',
        'Kimberly',
        'Emily',
        'Donna',
        'Michelle',
    ];

    /**
     * Surnames data
     *
     * @var array
     */
    const SURNAME_DATA = [
        'Smith',
        'Johnson',
        'Williams',
        'Brown',
        'Jones',
        'Garcia',
        'Miller',
        'Davis',
        'Rodriguez',
        'Martinez',
        'Hernandez',
        'Lopez',
        'Gonzalez',
        'Wilson',
        'Anderson',
        'Thomas',
        'Taylor',
        'Moore',
        'Jackson',
        'Martin',
        'Lee',
        'Perez',
        'Thompson',
        'White',
        'Harris',
        'Sanchez',
        'Clark',
    ];

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
     * @var string
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
     * @return string
     */
    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    /**
     * @param string $dateOfBirth
     * @return Customer
     */
    public function setDateOfBirth(string $dateOfBirth): Customer
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

    /**
     * Create a customer model populated with random data
     *
     * @return Customer
     */
    public static function createRandom(): Customer
    {
        $account = Account::createRandom();

        $customer = new Customer();
        $customer->setCustomerId($account->getCustomerId())
                    ->setFirstName(Customer::FIRST_NAME_DATA[array_rand(Customer::FIRST_NAME_DATA)])
                    ->setSurname(Customer::SURNAME_DATA[array_rand(Customer::SURNAME_DATA)])
                    ->setDateOfBirth(Util::createRandomDate(1950, 2000))
                    ->setPassword(str_shuffle(uniqid() . uniqid()))
                    ->setNationality(Country::createRandom())
                    ->setAccount($account);

        return $customer;
    }
}
