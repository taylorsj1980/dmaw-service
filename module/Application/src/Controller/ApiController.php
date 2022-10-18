<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Util\Util;
use Dmaw\ClientFactory;
use Dmaw\Exception as DmawException;
use Laminas\Mvc\Controller\AbstractRestfulController;
use Laminas\Http\Response;
use Laminas\View\Model\JsonModel;

class ApiController extends AbstractRestfulController
{
    /**
     * Create a new resource
     *
     * @param  mixed $data
     * @return JsonModel|Response
     */
    public function create($data)
    {
        //  Use the factory to create the client
        $dmawClient = ClientFactory::create();

        //  Unmarshal the data with the client
        try {
            //  Unmarshal the data to return an array containing the data model objects (if appropriate DMAW metadata is present)
            $unmarshalledData = $dmawClient::unmarshal($data);

            //  Get the name of the next environment to send the request to
            $targetEnvName = Util::getNextEnvName();

            if (is_string($targetEnvName)) {
                //  Send the unmarshalled data on to the next environment
                $response = $dmawClient->post(sprintf('http://%s/api', $targetEnvName), $unmarshalledData);

                $unmarshalledData = $response->getBodyContentsAsArray(true);
            }

            //  Marshal the data again to return a JSON copy
            $data = $dmawClient::marshal($unmarshalledData);
        } catch (DmawException $ex) {
            $response = new Response();
            $response->setContent($ex->getMessage());
            $response->setStatusCode(Response::STATUS_CODE_500);

            return $response;
        }

        //  Add a marker in the data to show that the package has been processed by this environment
        if (!isset($data['environments_processed'])) {
            $data['environments_processed'] = [];
        }

        $data['environments_processed'][Util::getEnvName()] = hash('md5', serialize(new Response()));

        return new JsonModel($data);
    }
}
