<?php

namespace Application\Model;

/**
 * Transaction data entity
 */
class Transaction extends AbstractModel
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
     * @var string
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
     * @return string
     */
    public function getWhen(): string
    {
        return $this->when;
    }

    /**
     * @param string $when
     * @return Transaction
     */
    public function setWhen(string $when): Transaction
    {
        $this->when = $when;
        return $this;
    }
}
