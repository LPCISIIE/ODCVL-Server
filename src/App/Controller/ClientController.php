<?php

namespace App\Controller;

use App\Model\Category;
use App\Model\Client;
use App\Model\Location;
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

    /**
     * Add client
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function post(Request $request, Response $response)
    {
        $this->validator->validate($request, [
            'nom' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Le nom est requis'

                ]
            ],
            'prenom' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Le prénom est requis'

                ]
            ],
            'organisme' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Le nom  de l\'organisme est requis'

                ]
            ],
            'adresse' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'L\'adresse  est requise'

                ]
            ],
            'telephone' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Le numéro de téléphone  est requis'

                ]
            ],
            'email' => [
                'rules' => V::noWhitespace()->email(),
                'messages' => [
                    'notBlank' => 'L\'email est requis'

                ]
            ],
        ]);

        if ($this->validator->isValid()) {
            $client = new Client([
                'nom' => $request->getParam('nom'),
                'prenom' => $request->getParam('prenom'),
                'organisme' => $request->getParam('organisme'),
                'adresse' => $request->getParam('adresse'),
                'telephone' => $request->getParam('telephone'),
                'email' => $request->getParam('email')

            ]);

            $client->save();

            return $this->created($response, 'get_client', [
                'id' => $client->id
            ]);
        }

        return $this->validationErrors($response);
    }

    /**
     * Edit client
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     */
    public function put(Request $request, Response $response, $id)
    {
        $client = Client::with('locations')->find($id);

        if (null === $client) {
            throw $this->notFoundException($request, $response);
        }

        $this->validator->validate($request, [
            'nom' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Veuillez donner un nom au client'
                ]
            ],
            'prenom' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Veuillez donner un prénom au client'
                ]
            ],
            'organisme' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Veuillez donner l\'organisme du client'
                ]
            ],
            'adresse' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Veuillez donner l\'adresse du  client'
                ]
            ],
            'telephone' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Veuillez donner un numéro de téléphone au client'
                ]
            ],
            'email' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Veuillez donner un email au  client'
                ]
            ],
        ]);



        if ($this->validator->isValid()) {
            $client->nom = $request->getParam('nom');
            $client->prenom = $request->getParam('prenom');
            $client->organisme = $request->getParam('organisme');
            $client->adresse = $request->getParam('adresse');
            $client->telephone = $request->getParam('telephone');
            $client->email = $request->getParam('email');
            $client->save();

            //$client->locations()->sync([$location->id]);

            return $this->noContent($response);
        }

        return $this->validationErrors($response);
    }



    /**
     * Delete client
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     */
    public function delete(Request $request, Response $response, $id)
    {
        $client = Client::find($id);

        if (null === $client) {
            throw $this->notFoundException($request, $response);
        }

        $client->locations()->delete();
        //$client->locations()->detach();
        $client->delete();

        return $this->noContent($response);
    }










}
