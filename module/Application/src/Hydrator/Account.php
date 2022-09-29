<?php

namespace Application\Hydrator;

use Application\Hydrator\Strategy\CountryStrategy;
use Application\Hydrator\Strategy\IdStrategy;
use Application\Hydrator\Strategy\TransactionStrategy;
use Laminas\Hydrator\ClassMethodsHydrator;

class Account extends ClassMethodsHydrator
{
    public function __construct()
    {
        parent::__construct();

        $this->addStrategy('account_id', new IdStrategy());
        $this->addStrategy('customer_id', new IdStrategy());
        $this->addStrategy('country', new CountryStrategy());
        $this->addStrategy('transaction', new TransactionStrategy());
    }
}
