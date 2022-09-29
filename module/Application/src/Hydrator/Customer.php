<?php

namespace Application\Hydrator;

use Application\Hydrator\Strategy\AccountStrategy;
use Application\Hydrator\Strategy\CountryStrategy;
use Application\Hydrator\Strategy\IdStrategy;
use Laminas\Hydrator\ClassMethodsHydrator;

class Customer extends ClassMethodsHydrator
{
    public function __construct()
    {
        parent::__construct();

        $this->addStrategy('customer_id', new IdStrategy());
        $this->addStrategy('nationality', new CountryStrategy());
        $this->addStrategy('account', new AccountStrategy());
    }
}
