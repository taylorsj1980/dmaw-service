<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Form\Customer as CustomerForm;
use Application\Model\Customer;
use Application\Util\Util;
use Dmaw\ClientFactory;
use Laminas\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $form = new CustomerForm();
        $errors = [];

        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());

            $errors = $form->validate();

            if (empty($errors)) {
                $customer = $form->extractAsModel();

var_dump($customer);die();

                //  Get the name of the next environment
                $targetEnvName = Util::getNextEnvName(true);


//        //  Use the factory to create the client
//        $client = ClientFactory::create();
//
////TODO - move the base target to be injected into the client by the factory?
//        $response = $client->post(sprintf('http://%s/api', $targetEnvName), [
//            'time' => time(),
//        ]);


            }
        } else {
            //  Inject random data into the form for testing
            $form->bind(Customer::createRandom());
        }

        //  Parse the errors into sections for display
        $customerErrors = $accountErrors = $transactionErrors = [];

        if (isset($errors['customer'])) {
            $customerErrors = $errors['customer'];

            if (isset($customerErrors['account'])) {
                $accountErrors = $customerErrors['account'];

                if (isset($accountErrors['transaction'])) {
                    $transactionErrors = $accountErrors['transaction'];
                    unset($accountErrors['transaction']);
                }

                unset($customerErrors['account']);
            }
        }

        return [
            'form'              => $form,
            'customerErrors'    => $customerErrors,
            'accountErrors'     => $accountErrors,
            'transactionErrors' => $transactionErrors,
        ];
    }
}
