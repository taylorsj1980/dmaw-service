<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Util\Util;
use Dmaw\Client as DmawClient;
use Dmaw\Exception as DmawException;
use Laminas\Mvc\Controller\AbstractRestfulController;
use Laminas\Http\Response;
use Laminas\View\Model\JsonModel;

class ApiController extends AbstractRestfulController
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

    /**
     * Create a new resource
     *
     * @param  mixed $data
     * @return JsonModel|Response
     */
    public function create($data)
    {
        //  Unmarshal the data with the client
        try {
            //  Unmarshal the data to return an array containing the data model objects (if appropriate DMAW metadata is present)
            $unmarshalledData = $this->dmawClient::unmarshal($data);
            $customerIn = $unmarshalledData['customer'];

            //  Get the name of the next environment to send the request to
            $targetEnvName = Util::getEnvName(true);

            if (is_string($targetEnvName)) {
                //  Send the unmarshalled data on to the next environment
                $response = $this->dmawClient->post(sprintf('http://%s/api', $targetEnvName), $unmarshalledData);

                $unmarshalledResponseData = $response->getBodyContentsAsArray(true);
                $customerOut = $unmarshalledResponseData['customer'];

                //  Add a comparison to the unmarshalled data so it can be returned in the response
                if (!isset($unmarshalledResponseData['comparisons'])) {
                    $unmarshalledResponseData['comparisons'] = [];
                }

                $unmarshalledResponseData['comparisons'][Util::getEnvName()] = Util::getComparisonHashes($customerIn, $customerOut);

                $data = $this->dmawClient::marshal($unmarshalledResponseData);
            } else {
                //  Marshal the data again to return a JSON copy
                $data = $this->dmawClient::marshal($unmarshalledData);
            }
        } catch (DmawException $ex) {
            $response = new Response();
            $response->setContent($ex->getMessage());
            $response->setStatusCode(Response::STATUS_CODE_500);

            return $response;
        }

        return new JsonModel($data);
    }
}
