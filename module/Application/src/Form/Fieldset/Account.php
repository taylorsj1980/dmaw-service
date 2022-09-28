<?php

namespace Application\Form\Fieldset;

use Application\Form\Select\Country;
use Laminas\Validator\Date as DateValidator;

class Account extends AbstractFieldset
{
    public function __construct($name = null)
    {
        parent::__construct($name);

        $this->add([
            'name' => 'account_id',
            'type' => 'hidden',
        ]);

        $this->add([
            'name' => 'customer_id',
            'type' => 'hidden',
        ]);

        $this->add([
            'name' => 'country',
            'type' => Country::class,
            'options' => [
                'label' => 'Country',
                'empty_option' => 'Please select...'
            ],
            'attributes' => [
                'class' => 'form-control',
            ],
        ]);

        $this->add([
            'name' => 'opened',
            'type' => 'text',
            'options' => [
                'label' => 'Opened Date',
            ],
            'attributes' => [
                'class' => 'form-control',
            ],
        ]);

        $this->add([
            'name' => 'transaction',
            'type' => Transaction::class,
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

        //  Check all mandatory values have been submitted
        $mandatoryFields = [
            'country',
            'opened',
        ];

        foreach ($mandatoryFields as $mandatoryField) {
            $field = $this->get($mandatoryField);

            if (empty($field->getValue())) {
                $errors[$mandatoryField] = $field->getLabel() . ' is a mandatory field';
            }
        }

        if (!isset($errors['opened'])) {
            //  Validate that the date is in the correct format
            $dateValidator = new DateValidator('d/m/Y');
            $openedField = $this->get('opened');

            if (!$dateValidator->isValid($openedField->getValue())) {
                $errors['opened'] = $openedField->getLabel() . ' must be of the required format ' . $dateValidator->getFormat();
            }
        }

        //  Validate the transaction fieldset
        $transactionErrors = $this->get('transaction')->validate();

        if (!empty($transactionErrors)) {
            $errors['transaction'] = $transactionErrors;
        }

        return $errors;
    }
}
