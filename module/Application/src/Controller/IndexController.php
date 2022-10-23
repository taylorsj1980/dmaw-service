<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Form\Customer as CustomerForm;
use Application\Util\Util;
use Dmaw\Client as DmawClient;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\Session\Container;

class IndexController extends AbstractActionController
{
    /**
     * @var DmawClient
     */
    private $dmawClient;

    /**
     * @param DmawClient $dmawClient
     */
    public function __construct(DmawClient $dmawClient)
    {
        $this->dmawClient = $dmawClient;
    }

    public function indexAction()
    {
        $form = new CustomerForm();

        //  Initialise the error message container arrays
        $customerErrors = $accountErrors = $transactionErrors = [];

        //  Clear any data in the session
        $session = new Container();
        $session->requestData = null;
        $session->responseData = null;
        $session->comparisons = null;

        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());

            $errors = $form->validate();

            if (empty($errors)) {
                $customer = $form->extractAsModel();

                //  Set the customer data in the session for comparison later before attempting to send via DMAW
                $session->requestData = $customer;

                //  Send the request to the API end point of the current environment - it will be passed on from there
                $response = $this->dmawClient->post(sprintf('http://%s/api', Util::getEnvName()), [
                    'customer' => $customer,
                ]);

                $responseData = $response->getBodyContentsAsArray(true);
                $returnedCustomer = $responseData['customer'];

                //  Set the data from the response in session for comparison later
                $session->responseData = $returnedCustomer;

                //  Extract any comparison data added by other servers from the response data
                $comparisons = (isset($responseData['comparisons']) ? $responseData['comparisons'] : []);

                //  Perform one last comparison and add the data to the session to display in comparison
                $comparisons[Util::getEnvName()] = Util::getComparisonHashes($customer, $returnedCustomer);
                $session->comparisons = $comparisons;

                //  Redirect to the compare route so that the request and response data can be compared
                return $this->redirect()->toRoute('compare');
            } else {
                //  Process the errors
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
            }
        } else {
            //  Inject random data into the form for testing
            $form->bind(Util::createRandomCustomer());
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

        $comparisons = $session->comparisons;
        ksort($comparisons);

        return [
            'requestData'   => $requestData,
            'responseData'  => $responseData,
            'comparisons'   => $comparisons,
        ];
    }
}
