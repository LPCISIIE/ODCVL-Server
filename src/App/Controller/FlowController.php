<?php

namespace App\Controller;

use App\Model\Flow;
use App\Model\Location;
use Respect\Validation\Validator as V;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class FlowController extends Controller
{
    /**
     * Get flows list
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function getCollection(Request $request, Response $response)
    {
        $page = $request->getParam('page') ? (int) $request->getParam('page') : 1;

        $flows = Flow::with('location')
            ->take(20)
            ->skip(20 * ($page - 1))
            ->get();

        return $this->ok($response, $flows);
    }

    /**
     * Get one flow
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     */
    public function get(Request $request, Response $response, $id)
    {
        $flow = Flow::find($id);

        if (null === $flow) {
            throw $this->notFoundException($request, $response);
        }

        return $this->ok($response, $flow);
    }

    /**
     * Add flow
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function post(Request $request, Response $response)
    {
        $this->validator->validate($request, [
            'date_sortie' => [
                'rules' => V::notBlank()->date('d/m/Y'),
                'messages' => [
                    'notBlank' => 'La date de sortie  est requise',
                    'date' => 'Veuillez saisir une date valide'
                ]
            ],
            'date_entree' => [
                'rules' => V::notBlank()->date('d/m/Y'),
                'messages' => [
                    'notBlank' => 'Veuillez préciser la date d\'entrée',
                    'date' => 'Veuillez saisir une date valide'
                ]
            ],
            'location_id' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'La location est requise'
                ]
            ],
            'type' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Le type est requis'
                ]
            ],
            'status' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Statut est requis'
                ]
            ]
        ]);

        if ($request->getParam('location_id')) {
            $location = Location::find($request->getParam('location_id'));

            if (null === $location) {
                $this->validator->addError('location_id', 'Location inconnue');
            }
        }

        if ($this->validator->isValid()) {
            $flow = new Flow([
                'date_sortie' => \DateTime::createFromFormat('d/m/Y', $request->getParam('date_sortie')),
                'date_entree' => \DateTime::createFromFormat('d/m/Y', $request->getParam('date_entree')),
                'type' => $request->getParam('type'),
                'status' => $request->getParam('status'),
            ]);

            $flow->location()->associate($location);
            $flow->save();

            return $this->created($response, 'get_flow', [
                'id' => $flow->id
            ]);
        }
        return $this->validationErrors($response);
    }

    /**
     * Edit flow
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     */
    public function put(Request $request, Response $response, $id)
    {
        $flow = Flow::find($id);

        if (null === $flow) {
            throw $this->notFoundException($request, $response);
        }

        $this->validator->validate($request, [
            'date_sortie' => [
                'rules' => V::notBlank()->date('d/m/Y'),
                'messages' => [
                    'notBlank' => 'Veuillez préciser la date de sortie',
                    'date' => '{{name}} n\'est pas une date valide'
                ]
            ],
            'date_entree' => [
                'rules' => V::notBlank()->date('d/m/Y'),
                'messages' => [
                    'notBlank' => 'Veuillez préciser la date d\'entrée',
                    'date' => '{{name}} n\'est pas une date valide'
                ]
            ],
            'created_at' => [
                'rules' => V::notBlank()->date('d/m/Y'),
                'messages' => [
                    'notBlank' => 'Veuillez préciser la date de création',
                    'date' => '{{name}} n\'est pas une date valide'
                ]
            ],
            'updated_at' => [
                'rules' => V::notBlank()->date('d/m/Y'),
                'messages' => [
                    'notBlank' => 'Veuillez préciser la date de mise à jour',
                    'date' => '{{name}} n\'est pas une date valide'
                ]
            ],
            'type' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Le type est requis'
                ]
            ],
            'status' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Le statut est requis'
                ]
            ],
            'location_id' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'La location est requise'
                ]
            ]
        ]);

        if ($request->getParam('location_id')) {
            $location = Location::find($request->getParam('location_id'));

            if (null === $location) {
                $this->validator->addError('location_id', 'Location inconnue');
            }
        }

        if ($this->validator->isValid()) {
            $flow->date_sortie = \DateTime::createFromFormat('d/m/Y', $request->getParam('date_sortie'));
            $flow->date_entree = \DateTime::createFromFormat('d/m/Y', $request->getParam('date_entree'));
            $flow->created_at = \DateTime::createFromFormat('d/m/Y', $request->getParam('created_at'));
            $flow->updated_at = \DateTime::createFromFormat('d/m/Y', $request->getParam('updated_at'));
            $flow->type = $request->getParam('type');
            $flow->status = $request->getParam('status');
            $flow->location()->associate($location);
            $flow->save();

            return $this->noContent($response);
        }


        return $this->validationErrors($response);
    }

    /**
     * Delete flow
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     */
    public function delete(Request $request, Response $response, $id)
    {
        $flow = Flow::find($id);

        if (null === $flow) {
            throw $this->notFoundException($request, $response);
        }

        $flow->delete();

        return $this->noContent($response);
    }
}
