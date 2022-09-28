<?php

namespace Application\Form\Select;

use Application\Model\Country as CountryModel;
use Laminas\Form\Element\Select;

class Country extends Select
{
    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->setValueOptions(CountryModel::COUNTRY_DATA);
    }
}
