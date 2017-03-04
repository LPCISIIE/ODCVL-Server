<?php

namespace App\Controller;

use App\Model\Location;
use App\Model\Item;
use App\Model\Client;
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
        return $this->ok($response, Location::with('client')->get());
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


     /**
     * Add Location
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function post(Request $request, Response $response)
    {
        $this->validator->validate($request, [
            'date_debut' => [
                'rules' => V::notBlank()->date('d/m/Y'),
                'messages' => [
                    'notBlank' => 'La date de début de location est requis',
                    'date' => 'Veuillez saisir une date valide'
                ]
            ],
            'date_fin' => [
                'rules' => V::notBlank()->date('d/m/Y'),
                'messages' => [
                    'notBlank' => 'Veuillez préciser la date d\'achat',
                    'date' => 'Veuillez saisir une date valide'
                ]
            ],
            'client_id' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Le Client est requis'
                ]
            ],

            'status' => [
                'rules' => V::intVal(),
                'messages' => [
                    'intVal' => 'Status invalide'
                ]
            ],

            'items' => [
                'rules' => V::arrayVal()->each(v::intVal()),
                'messages' => [
                    'arrayVal' => 'Un ou plusieurs items sont invalide'
                ]
            ]


        ]);

        $arr_items = $request->getParam('items');

        if ($arr_items) {

            $items = Item::findMany($arr_items)->toArray();

            if (null === $items) {
                $this->validator->addError('items', 'Items inconnu');
            }
        }

        if ($request->getParam('client_id')) {
            $client = Client::find($request->getParam('client_id'));

            if (null === $client) {
                $this->validator->addError('client_id', 'Client inconnu');
            }
        }

        if ( $this->validator->isValid()) {
            $location = new Location([
            'date_debut' => \DateTime::createFromFormat('d/m/Y', $request->getParam('date_debut')),
            'date_fin' => \DateTime::createFromFormat('d/m/Y', $request->getParam('date_fin'))
            //'client_id' => 1
            ]);

            $location->client()->associate($client);
             $location->save();
            $location->items()->attach($arr_items);

            return $this->created($response, 'get_location', [
                'id' => $location->id
            ]);
        }

        return $this->validationErrors($response);
    }
  
}
