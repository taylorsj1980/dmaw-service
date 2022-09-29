<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Form\Customer as CustomerForm;
use Application\Model\Customer;
use Application\Util\Util;
use Dmaw\ClientFactory;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\Session\Container;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $form = new CustomerForm();
        $errors = [];

        //  Clear any data in the session
        $session = new Container();
        $session->requestData = null;
        $session->responseData = null;

        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());

            $errors = $form->validate();

            if (empty($errors)) {
                $customer = $form->extractAsModel();

                //  Set the customer data in the session for comparison later before attempting to send via DMAW
                $session->requestData = $customer;

                //  Get the name of the next environment
                $targetEnvName = Util::getNextEnvName(true);


//        //  Use the factory to create the client
//        $client = ClientFactory::create();
//
////TODO - move the base target to be injected into the client by the factory?
//        $response = $client->post(sprintf('http://%s/api', $targetEnvName), [
//            'time' => time(),
//        ]);

                //  Set the data from the response in session for comparison later
//TODO - Extract the customer from the response in due course
                $session->responseData = $customer;

                //  Redirect to the compare route so that the request and response data can be compared
                return $this->redirect()->toRoute('compare');
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

    public function compareAction()
    {
        //  Get the request data and response data from the session for comparison
        $session = new Container();
        $requestData = $session->requestData;
        $responseData = $session->responseData;

        if (is_null($requestData) || is_null($responseData)) {
            return $this->redirect()->toRoute('home');
        }

        return [
            'requestData'   => $requestData,
            'responseData'  => $responseData,
        ];
    }
}
