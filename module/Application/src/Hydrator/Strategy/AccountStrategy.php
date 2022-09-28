<?php

namespace Application\Hydrator\Strategy;

use Application\Model\Account as AccountModel;
use Application\Hydrator\Account;
use Laminas\Hydrator\Strategy\HydratorStrategy;

class AccountStrategy extends HydratorStrategy
{
    public function __construct()
    {
        parent::__construct(new Account(), AccountModel::class);
    }
}
