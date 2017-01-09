<?php

namespace App\Controller;

use App\Model\Item;
use App\Model\Product;
use App\Model\Property;
use Respect\Validation\Validator as V;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ItemController extends Controller
{
    /**
     * Add item
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function add(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $this->validator->validate($request, [
                'code' => V::notBlank()->alnum(),
                'purchased_at' => V::date('d/m/Y'),
                'repaired_at' => V::optional(V::date('d/m/Y'))
            ]);

            if (Item::where('code', $request->getParam('code'))->first()) {
                $this->validator->addError('code', 'Code already exists');
            }

            $product = Product::find($request->getParam('product_id'));

            if (!$product) {
                $this->validator->addError('product_id', 'Unknown product');
            }

            $propertiesData = $request->getParam('property');
            $properties = $propertiesData ? Property::whereIn('id', array_keys($propertiesData))->get() : null;

            if ($propertiesData && count($propertiesData) != $properties->count()) {
                $this->validator->addError('properties', 'One or more properties don\'t exist');
            }

            if ($this->validator->isValid()) {
                $repairedAt = $request->getParam('repaired_at');
                $item = new Item([
                    'code' => $request->getParam('code'),
                    'purchased_at' => \DateTime::createFromFormat('d/m/Y', $request->getParam('purchased_at')),
                    'repaired_at' => $repairedAt ? \DateTime::createFromFormat('d/m/Y', $repairedAt) : null
                ]);
                $item->product()->associate($product);
                $item->save();

                foreach ($propertiesData as $id => $value) {
                    $item->properties()->attach($id, ['value' => $value]);
                }

                $this->flash('success', 'Item "' . $item->name . '" added');
                return $this->redirect($response, 'item.get');
            }
        }

        return $this->view->render($response, 'Item/add.twig', [
            'products' => Product::all()
        ]);
    }

    /**
     * Edit item
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     */
    public function edit(Request $request, Response $response, $id)
    {
        $item = Item::find($id);

        if (!$item) {
            throw $this->notFoundException($request, $response);
        }

        if ($request->isPost()) {
            $this->validator->validate($request, [
                'purchased_at' => V::date('d/m/Y'),
                'repaired_at' => V::optional(V::date('d/m/Y'))
            ]);

            $product = Product::find($request->getParam('product_id'));

            if (!$product) {
                $this->validator->addError('product_id', 'Unknown product');
            }

            $propertiesData = $request->getParam('property');
            $properties = $propertiesData ? Property::whereIn('id', array_keys($propertiesData))->get() : null;

            if ($propertiesData && count($propertiesData) != $properties->count()) {
                $this->validator->addError('properties', 'One or more properties don\'t exist');
            }

            if ($this->validator->isValid()) {
                $item->purchased_at = \DateTime::createFromFormat('d/m/Y', $request->getParam('purchased_at'));
                $repairedAt = $request->getParam('repaired_at');
                if ($repairedAt) {
                    $item->repaired_at = \DateTime::createFromFormat('d/m/Y', $repairedAt);
                }
                $item->product()->associate($product);
                $item->save();

                $item->properties()->detach();
                foreach ($propertiesData as $propId => $value) {
                    $item->properties()->attach($propId, ['value' => $value]);
                }

                $this->flash('success', 'Item "' . $item->code . '" edited');
                return $this->redirect($response, 'item.get');
            }
        }

        return $this->view->render($response, 'Item/edit.twig', [
            'item' => $item,
            'products' => Product::all()
        ]);
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

        if (!$item) {
            throw $this->notFoundException($request, $response);
        }

        $item->properties()->detach();
        $item->delete();

        $this->flash('success', 'Item "' . $item->code . '" deleted');
        return $this->redirect($response, 'item.get');
    }

    /**
     * Get items list
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function get(Request $request, Response $response)
    {
        return $this->view->render($response, 'Item/get.twig', [
            'items' => Item::with('product')->get()
        ]);
    }
}
