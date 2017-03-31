<?php

namespace App\Controller;

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
        $page = $request->getParam('page') ? (int) $request->getParam('page') : 1;

        $clients = Client::with('locations')
            ->take(20)
            ->skip(20 * ($page - 1))
            ->get();

        return $this->ok($response, $clients);
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
                    'notBlank' => 'Le nom de l\'organisme est requis'
                ]
            ],
            'adresse' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'L\'adresse est requise'
                ]
            ],
            'telephone' => [
                'rules' => V::numeric(),
                'messages' => [
                    'numeric' => 'Le numéro de téléphone doit être valide'
                ]
            ],
            'email' => [
                'rules' => V::notBlank()->noWhitespace()->email(),
                'messages' => [
                    'notBlank' => 'L\'email est requis',
                    'email' => 'Email invalide'
                ]
            ]
        ]);

        if(Client::validateEmail($request->getParam('email')) !== null)
        {
            $this->validator->addError('email', 'Cet email est déja utilisé');
        }
        
        if ($this->validator->isValid()) {
            $client = new Client($this->params($request, [
                'nom',
                'prenom',
                'organisme',
                'adresse',
                'telephone',
                'email'
            ]));

            $client->save();
            $data = json_decode($client,true);
            return $response->withJson($data, 201);
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
                'rules' => V::notBlank()->noWhitespace()->email(),
                'messages' => [
                    'notBlank' => 'Veuillez donner un email au  client',
                    'email' => 'Email invalide'
                ]
            ],
        ]);

        if ($this->validator->isValid()) {
            $client->fill($this->params($request, [
                'nom',
                'prenom',
                'organisme',
                'adresse',
                'telephone',
                'email'
            ]));
            $client->save();

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
        $client->delete();

        return $this->noContent($response);
    }
}
