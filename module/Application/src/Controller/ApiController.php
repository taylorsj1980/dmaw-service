<?php

declare(strict_types=1);

namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractRestfulController;
use Laminas\View\Model\JsonModel;

class ApiController extends AbstractRestfulController
{
    /**
     * Create a new resource
     *
     * @param  mixed $data
     * @return JsonModel
     */
    public function create($data)
    {
        return new JsonModel([
            'request_data' => $data
        ]);
    }
}
