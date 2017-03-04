<?php

namespace App\Controller;

use App\Model\Location;
//use App\Model\Product;
use Respect\Validation\Validator as V;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class LocationController extends Controller
{
    /**
     * Get Location list
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function getCollection(Request $request, Response $response)
    {
        return $this->ok($response, Location::get());
    }

    /**
     * Get one Locaiton
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     */
    public function get(Request $request, Response $response, $id)
    {
        $location = Location::find($id);

        if (null === $location) {
            throw $this->notFoundException($request, $response);
        }

        return $this->ok($response, $location);
    }

     /**
     * Delete location
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     */
    public function delete(Request $request, Response $response, $id)
    {
        $location = Location::find($id);

        if (null === $location) {
            throw $this->notFoundException($request, $response);
        }

        $location->delete();

        return $this->noContent($response);
    }

  
}
