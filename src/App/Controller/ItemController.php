<?php

namespace App\Controller;

use App\Model\Item;
use App\Model\Product;
use App\Model\Property;
use Respect\Validation\Validator as V;
use Psr\Http\Message\ServerRequestInterface as Request;
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
                $this->validator->addError('code', 'Ce code existe déjà');
            }

            $product = Product::find($request->getParam('product_id'));

            if (!$product) {
                $this->validator->addError('product_id', 'Produit inconnu');
            }

            $propertiesData = $request->getParam('property');
            $properties = $propertiesData ? Property::whereIn('id', array_keys($propertiesData))->get() : null;

            if ($propertiesData && count($propertiesData) != $properties->count()) {
                $this->validator->addError('properties', 'Une ou plusieurs propriétés n\'existent pas');
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

                $this->flash('success', 'Article "' . $item->name . '" ajouté');
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
                $this->validator->addError('product_id', 'Produit inconnu');
            }

            $propertiesData = $request->getParam('property');
            $properties = $propertiesData ? Property::whereIn('id', array_keys($propertiesData))->get() : null;

            if ($propertiesData && count($propertiesData) != $properties->count()) {
                $this->validator->addError('properties', 'Une ou plusieurs propriétés n\'existent pas');
            }

            if ($this->validator->isValid()) {
                $item->purchased_at = \DateTime::createFromFormat('d/m/Y', $request->getParam('purchased_at'));
                $repairedAt = $request->getParam('repaired_at');
                if ($repairedAt) {
                    $item->repaired_at = \DateTime::createFromFormat('d/m/Y', $repairedAt);
                }
                $item->product()->associate($product);
                $item->save();

                $newProperties = [];
                foreach ($propertiesData as $propId => $value) {
                    $newProperties[$propId] = ['value' => $value];
                }
                $item->properties()->sync($newProperties);

                $this->flash('success', 'Article "' . $item->code . '" modifié');
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

        $this->flash('success', 'Article "' . $item->code . '" supprimé');
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
