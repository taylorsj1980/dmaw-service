<?php

namespace Application\Form\Fieldset;

use Application\Form\Select\Country;
use Application\Hydrator\Customer as CustomerHydrator;
use Laminas\Validator\Date as DateValidator;

class Customer extends AbstractFieldset
{
    public function __construct($name = null)
    {
        parent::__construct($name);

        $this->setHydrator(new CustomerHydrator());

        $this->add([
            'name' => 'customer_id',
            'type' => 'hidden',
        ]);

        $this->add([
            'name' => 'first_name',
            'type' => 'text',
            'options' => [
                'label' => 'First Name',
            ],
            'attributes' => [
                'class' => 'form-control',
            ],
        ]);

        $this->add([
            'name' => 'surname',
            'type' => 'text',
            'options' => [
                'label' => 'Surname',
            ],
            'attributes' => [
                'class' => 'form-control',
            ],
        ]);

        $this->add([
            'name' => 'date_of_birth',
            'type' => 'text',
            'options' => [
                'label' => 'Date of Birth',
            ],
            'attributes' => [
                'class' => 'form-control',
            ],
        ]);

        $this->add([
            'name' => 'nationality',
            'type' => Country::class,
            'options' => [
                'label' => 'Nationality',
                'empty_option' => 'Please select...'
            ],
            'attributes' => [
                'class' => 'form-control',
            ],
        ]);

        $this->add([
            'name' => 'password',
            'type' => 'text',
            'options' => [
                'label' => 'Password',
            ],
            'attributes' => [
                'class' => 'form-control',
            ],
        ]);

        $this->add([
            'name' => 'account',
            'type' => Account::class,
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
            'first_name',
            'surname',
            'date_of_birth',
            'nationality',
            'password',
        ];

        foreach ($mandatoryFields as $mandatoryField) {
            $field = $this->get($mandatoryField);

            if (empty($field->getValue())) {
                $errors[$mandatoryField] = $field->getLabel() . ' is a mandatory field';
            }
        }

        if (!isset($errors['date_of_birth'])) {
            //  Validate that the date is in the correct format
            $dateValidator = new DateValidator('d/m/Y');
            $dateOfBirthField = $this->get('date_of_birth');

            if (!$dateValidator->isValid($dateOfBirthField->getValue())) {
                $errors['date_of_birth'] = $dateOfBirthField->getLabel() . ' must be of the required format ' . $dateValidator->getFormat();
            }
        }

        //  Validate the account fieldset
        $accountErrors = $this->get('account')->validate();

        if (!empty($accountErrors)) {
            $errors['account'] = $accountErrors;
        }

        return $errors;
    }
}
