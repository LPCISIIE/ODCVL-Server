<?php

namespace App\Controller;

use App\Model\Item;
use App\Model\Product;
use Respect\Validation\Validator as V;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ItemController extends Controller
{
    /**
     * Get items list
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function getCollection(Request $request, Response $response)
    {
        return $this->ok($response, Item::with('product')->get());
    }

    /**
     * Get one item
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     */
    public function get(Request $request, Response $response, $id)
    {
        $item = Item::find($id);

        if (null === $item) {
            throw $this->notFoundException($request, $response);
        }

        return $this->ok($response, $item);
    }



    /**
     * Get one item by barcode     *
     * @param Request $request
     * @param Response $response
     * @param string $code
     * @return Response
     */
    public function getByCode(Request $request, Response $response, $code)
    {
        $item = Item::where('code','=',$code)->first();

        if (null === $item) {
            throw $this->notFoundException($request, $response);
        }

        return $this->ok($response, $item);
    }
    /**
     * Add item
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function post(Request $request, Response $response)
    {
        $this->validator->validate($request, [
            'code' => [
                'rules' => V::notBlank()->alnum(),
                'messages' => [
                    'notBlank' => 'Le code barre est requis',
                    'alnum' => 'Le code ne peut contenir que des lettres et des chiffres'
                ]
            ],
            'purchased_at' => [
                'rules' => V::notBlank()->date('d/m/Y'),
                'messages' => [
                    'notBlank' => 'Veuillez préciser la date d\'achat',
                    'date' => '{{name}} n\'est pas une date valide'
                ]
            ],
            'product_id' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Le matériel est requis'
                ]
            ]
        ]);

        if (Item::where('code', $request->getParam('code'))->first()) {
            $this->validator->addError('code', 'Ce code existe déjà');
        }

        if ($request->getParam('product_id')) {
            $product = Product::find($request->getParam('product_id'));

            if (null === $product) {
                $this->validator->addError('product_id', 'Matériel inconnu');
            }
        }

        if ($this->validator->isValid()) {
            $item = new Item([
                'code' => $request->getParam('code'),
                'purchased_at' => \DateTime::createFromFormat('d/m/Y', $request->getParam('purchased_at'))
            ]);
            $item->product()->associate($product);
            $item->save();

            return $this->created($response, 'get_item', [
                'id' => $item->id
            ]);
        }

        return $this->validationErrors($response);
    }

    /**
     * Edit item
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     */
    public function put(Request $request, Response $response, $id)
    {
        $item = Item::find($id);

        if (null === $item) {
            throw $this->notFoundException($request, $response);
        }

        $this->validator->validate($request, [
            'purchased_at' => [
                'rules' => V::notBlank()->date('d/m/Y'),
                'messages' => [
                    'notBlank' => 'Veuillez préciser la date d\'achat',
                    'date' => '{{name}} n\'est pas une date valide'
                ]
            ],
            'product_id' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Le matériel est requis'
                ]
            ]
        ]);

        if ($request->getParam('product_id')) {
            $product = Product::find($request->getParam('product_id'));

            if (null === $product) {
                $this->validator->addError('product_id', 'Matériel inconnu');
            }
        }

        if ($this->validator->isValid()) {
            $item->purchased_at = \DateTime::createFromFormat('d/m/Y', $request->getParam('purchased_at'));
            $item->product()->associate($product);
            $item->save();

            return $this->noContent($response);
        }

        return $this->validationErrors($response);
    }

    /**
     * Delete item
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     */
    public function delete(Request $request, Response $response, $id)
    {
        $item = Item::find($id);

        if (null === $item) {
            throw $this->notFoundException($request, $response);
        }

        $item->delete();

        return $this->noContent($response);
    }
}
