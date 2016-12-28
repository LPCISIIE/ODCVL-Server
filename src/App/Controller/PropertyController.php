<?php

namespace App\Controller;

use App\Model\Property;
use Respect\Validation\Validator as V;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class PropertyController extends Controller
{
    /**
     * Add property
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function add(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $this->validator->validate($request, [
                'name' => V::notBlank()
            ]);

            if ($this->validator->isValid()) {
                $property = new Property([
                    'name' => $request->getParam('name')
                ]);

                $property->save();

                $this->flash('success', 'Property "' . $property->name . '" added');
                return $this->redirect($response, 'property.get');
            }
        }

        return $this->view->render($response, 'Property/add.twig');
    }

    /**
     * Edit property
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     * @throws \Slim\Exception\NotFoundException
     */
    public function edit(Request $request, Response $response, $id)
    {
        $property = Property::find($id);

        if (!$property) {
            throw $this->notFoundException($request, $response);
        }

        if ($request->isPost()) {
            $this->validator->validate($request, [
                'name' => V::notBlank()
            ]);

            if ($this->validator->isValid()) {
                $property->name = $request->getParam('name');
                $property->save();

                $this->flash('success', 'Property "' . $property->name . '" edited');
                return $this->redirect($response, 'property.get');
            }
        }

        return $this->view->render($response, 'Property/edit.twig', [
            'property' => $property
        ]);
    }

    /**
     * Delete property
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     * @throws \Slim\Exception\NotFoundException
     */
    public function delete(Request $request, Response $response, $id)
    {
        $property = Property::find($id);

        if (!$property) {
            throw $this->notFoundException($request, $response);
        }

        $property->items()->detach();
        $property->products()->detach();
        $property->categories()->detach();
        $property->delete();

        $this->flash('success', 'Property "' . $property->name . '" deleted');
        return $this->redirect($response, 'property.get');
    }

    /**
     * Get properties list
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function get(Request $request, Response $response)
    {
        return $this->view->render($response, 'Property/get.twig', [
            'properties' => Property::all()
        ]);
    }
}
