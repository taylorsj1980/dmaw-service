<?php

namespace Application\Hydrator;

use Application\Hydrator\Strategy\CurrencyStrategy;
use Application\Hydrator\Strategy\IdStrategy;
use Laminas\Hydrator\ClassMethodsHydrator;

class Transaction extends ClassMethodsHydrator
{
    public function __construct()
    {
        parent::__construct();

        $this->addStrategy('transaction_id', new IdStrategy());
        $this->addStrategy('account_id', new IdStrategy());
        $this->addStrategy('currency', new CurrencyStrategy());
    }
}
