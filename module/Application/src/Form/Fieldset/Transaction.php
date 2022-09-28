<?php

namespace Application\Form\Fieldset;

use Application\Form\Select\Currency;
use Laminas\Validator\Date as DateValidator;

class Transaction extends AbstractFieldset
{
    public function __construct($name = null)
    {
        parent::__construct($name);

        $this->add([
            'name' => 'transaction_id',
            'type' => 'hidden',
        ]);

        $this->add([
            'name' => 'account_id',
            'type' => 'hidden',
        ]);

        $this->add([
            'name' => 'amount',
            'type' => 'text',
            'options' => [
                'label' => 'Amount',
            ],
            'attributes' => [
                'class' => 'form-control',
            ],
        ]);

        $this->add([
            'name' => 'currency',
            'type' => Currency::class,
            'options' => [
                'label' => 'Currency',
                'empty_option' => 'Please select...'
            ],
            'attributes' => [
                'class' => 'form-control',
            ],
        ]);

        $this->add([
            'name' => 'dr_or_cr',
            'type' => 'select',
            'options' => [
                'label' => 'Debit or Credit',
                'empty_option' => 'Please select...',
                'value_options' => [
                    'dr' => 'Debit',
                    'cr' => 'Credit',
                ],
            ],
            'attributes' => [
                'class' => 'form-control',
            ],
        ]);

        $this->add([
            'name' => 'when',
            'type' => 'text',
            'options' => [
                'label' => 'When',
            ],
            'attributes' => [
                'class' => 'form-control',
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

        //  Check all mandatory values have been submitted
        $mandatoryFields = [
            'amount',
            'currency',
            'dr_or_cr',
            'when',
        ];

        foreach ($mandatoryFields as $mandatoryField) {
            $field = $this->get($mandatoryField);

            if (empty($field->getValue())) {
                $errors[$mandatoryField] = $field->getLabel() . ' is a mandatory field';
            }
        }

        if (!isset($errors['amount'])) {
            //  Validate that the amount is numeric
            $amountField = $this->get('amount');

            if (!is_numeric($amountField->getValue())) {
                $errors['amount'] = $amountField->getLabel() . ' must be a numeric value';
            }
        }

        if (!isset($errors['when'])) {
            //  Validate that the date is in the correct format
            $dateValidator = new DateValidator('d/m/Y');
            $whenField = $this->get('when');

            if (!$dateValidator->isValid($whenField->getValue())) {
                $errors['when'] = $whenField->getLabel() . ' must be of the required format ' . $dateValidator->getFormat();
            }
        }

        return $errors;
    }
}
