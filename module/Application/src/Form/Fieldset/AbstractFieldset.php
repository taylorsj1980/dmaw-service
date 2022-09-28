<?php

namespace Application\Form\Fieldset;

use Laminas\Form\Fieldset;

abstract class AbstractFieldset extends Fieldset
{
    /**
     * Perform any data validation and return any error messages
     *
     * @return array
     */
    abstract public function validate();
}
