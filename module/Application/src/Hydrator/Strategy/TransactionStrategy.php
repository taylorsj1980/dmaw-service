<?php

namespace Application\Hydrator\Strategy;

use Application\Model\Transaction as TransactionModel;
use Application\Hydrator\Transaction;
use Laminas\Hydrator\Strategy\HydratorStrategy;

class TransactionStrategy extends HydratorStrategy
{
    public function __construct()
    {
        parent::__construct(new Transaction(), TransactionModel::class);
    }
}
