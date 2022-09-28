<?php

namespace Application\Form\Select;

use Application\Model\Currency as CurrencyModel;
use Laminas\Form\Element\Select;

class Currency extends Select
{
    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->setValueOptions(CurrencyModel::CURRENCY_DATA);
    }
}
