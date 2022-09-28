<?php

namespace Application\Hydrator;

use Application\Hydrator\Strategy\AccountStrategy;
use Application\Hydrator\Strategy\CountryStrategy;
use Application\Hydrator\Strategy\IdStrategy;
use Laminas\Hydrator\ClassMethodsHydrator;
use Laminas\Hydrator\Strategy\DateTimeFormatterStrategy;

class Customer extends ClassMethodsHydrator
{
    public function __construct()
    {
        parent::__construct();

        $this->addStrategy('customer_id', new IdStrategy());
        $this->addStrategy('date_of_birth', new DateTimeFormatterStrategy('d/m/Y'));
        $this->addStrategy('nationality', new CountryStrategy());
        $this->addStrategy('account', new AccountStrategy());
    }
}
