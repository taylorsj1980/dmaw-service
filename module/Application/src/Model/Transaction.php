<?php

namespace Application\Model;

use DateTime;

/**
 * Transaction data entity
 */
class Transaction
{
    /**
     * @var ?int
     */
    private $transactionId;

    /**
     * @var ?int
     */
    private $accountId;

    /**
     * @var string
     */
    private $amount;

    /**
     * @var ?Currency
     */
    private $currency;

    /**
     * @var string
     */
    private $drOrCr;

    /**
     * @var ?DateTime
     */
    private $when;

    /**
     * @return int|null
     */
    public function getTransactionId(): ?int
    {
        return $this->transactionId;
    }

    /**
     * @param int|null $transactionId
     * @return Transaction
     */
    public function setTransactionId(?int $transactionId): Transaction
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAccountId(): ?int
    {
        return $this->accountId;
    }

    /**
     * @param int|null $accountId
     * @return Transaction
     */
    public function setAccountId(?int $accountId): Transaction
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     * @return Transaction
     */
    public function setAmount(string $amount): Transaction
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return Currency|null
     */
    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    /**
     * @param Currency|null $currency
     * @return Transaction
     */
    public function setCurrency(?Currency $currency): Transaction
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getDrOrCr(): string
    {
        return $this->drOrCr;
    }

    /**
     * @param string $drOrCr
     * @return Transaction
     */
    public function setDrOrCr(string $drOrCr): Transaction
    {
        $this->drOrCr = $drOrCr;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getWhen(): ?DateTime
    {
        return $this->when;
    }

    /**
     * @param DateTime|null $when
     * @return Transaction
     */
    public function setWhen(?DateTime $when): Transaction
    {
        $this->when = $when;
        return $this;
    }
}
