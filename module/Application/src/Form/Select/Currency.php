<?php

namespace Application\Form\Select;

use Application\Util\Util;
use Laminas\Form\Element\Select;

class Currency extends Select
{
    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->setValueOptions(Util::CURRENCY_DATA);
    }
}
