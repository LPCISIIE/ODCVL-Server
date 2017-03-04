<?php

namespace App\Controller;

use App\Model\Category;
use App\Model\Client;
use Respect\Validation\Validator as V;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ClientController extends Controller
{
    /**
     * Get products list
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function getCollection(Request $request, Response $response)
    {
        return $this->ok($response, Client::with('locations')->get());
    }

    /**
     * Get one product
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     */
    public function get(Request $request, Response $response, $id)
    {
        $client = Client::with('locations')->find($id);

        if (null === $client) {
            throw $this->notFoundException($request, $response);
        }

        return $this->ok($response, $client);
    }


}
