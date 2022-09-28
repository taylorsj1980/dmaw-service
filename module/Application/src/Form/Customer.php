<?php

namespace Application\Form;

use Application\Form\Fieldset\Customer as CustomerFieldset;
use Application\Hydrator\Customer as CustomerHydrator;
use Application\Model\Customer as CustomerModel;
use Laminas\Form\Form;
use Exception;

class Customer extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('customer');

        $this->add([
            'name' => 'customer',
            'type' => CustomerFieldset::class,
            'options' => [
                'use_as_base_fieldset' => true,
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Submit',
                'class' => 'btn btn-primary'
            ],
        ]);
    }

    /**
     * Perform any data validation
     *
     * @return array
     */
    public function validate()
    {
        $errors = [];

        //  Validate the customer fieldset
        $customerErrors = $this->get('customer')->validate();

        if (!empty($customerErrors)) {
            $errors['customer'] = $customerErrors;
        }

        $this->isValid = empty($errors);

        return $errors;
    }

    /**
     * Extract the data from the form fields and set the values in an appropriate model
     *
     * @return CustomerModel
     * @throws Exception
     */
    public function extractAsModel(): CustomerModel
    {
        if (!$this->isValid) {
            throw new Exception('Invalid data can not be extracted as a model');
        }

        //  Extract using the base fieldset
        return $this->get('customer')->getHydrator()->hydrate($this->data['customer'], new CustomerModel());
    }
}
