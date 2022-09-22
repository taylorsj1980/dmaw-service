<?php

namespace Application\Model;

use DateTime;

/**
 * Account data entity
 */
class Account
{
    /**
     * @var ?int
     */
    private $accountId;

    /**
     * @var ?int
     */
    private $customerId;

    /**
     * @var ?Country
     */
    private $country;

    /**
     * @var ?DateTime
     */
    private $opened;

    /**
     * @var ?Transaction
     */
    private $transaction;

    /**
     * @return int|null
     */
    public function getAccountId(): ?int
    {
        return $this->accountId;
    }

    /**
     * @param int|null $accountId
     * @return Account
     */
    public function setAccountId(?int $accountId): Account
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    /**
     * @param int|null $customerId
     * @return Account
     */
    public function setCustomerId(?int $customerId): Account
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @return Country|null
     */
    public function getCountry(): ?Country
    {
        return $this->country;
    }

    /**
     * @param Country|null $country
     * @return Account
     */
    public function setCountry(?Country $country): Account
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getOpened(): ?DateTime
    {
        return $this->opened;
    }

    /**
     * @param DateTime|null $opened
     * @return Account
     */
    public function setOpened(?DateTime $opened): Account
    {
        $this->opened = $opened;
        return $this;
    }

    /**
     * @return Transaction|null
     */
    public function getTransaction(): ?Transaction
    {
        return $this->transaction;
    }

    /**
     * @param Transaction|null $transaction
     * @return Account
     */
    public function setTransaction(?Transaction $transaction): Account
    {
        $this->transaction = $transaction;
        return $this;
    }
}
