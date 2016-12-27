<?php

namespace App\Controller;

use App\Model\Category;
use App\Model\Product;
use App\Model\Property;
use Respect\Validation\Validator as V;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ProductController extends Controller
{
    /**
     * Add product
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

            $category = Category::find($request->getParam('category_id'));
            $propertiesIds = $request->getParam('properties');
            $properties = $propertiesIds ? Property::whereIn('id', $propertiesIds)->get() : null;

            if (!$category) {
                $this->validator->addError('category_id', 'Category does not exist');
            }

            if ($propertiesIds && count($propertiesIds) != $properties->count()) {
                $this->validator->addError('properties', 'One or more properties don\'t exist');
            }

            if ($this->validator->isValid()) {
                $product = new Product([
                    'name' => $request->getParam('name')
                ]);

                $product->save();
                $product->categories()->attach($category);

                if ($properties) {
                    $product->properties()->attach($properties);
                }

                $this->flash('success', 'Product "' . $product->name . '" added');
                return $this->redirect($response, 'product.get');
            }
        }

        return $this->view->render($response, 'Product/add.twig', [
            'categories' => Category::all(),
            'properties' => Property::all()
        ]);
    }

    /**
     * Edit product
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     * @throws \Slim\Exception\NotFoundException
     */
    public function edit(Request $request, Response $response, $id)
    {
        $product = Product::with(['categories', 'properties'])->find($id);

        if (!$product) {
            throw $this->notFoundException($request, $response);
        }

        if ($request->isPost()) {
            $this->validator->validate($request, [
                'name' => V::notBlank()
            ]);

            $category = Category::find($request->getParam('category_id'));
            $propertiesIds = $request->getParam('properties');
            $properties = $propertiesIds ? Property::whereIn('id', $propertiesIds)->get() : null;

            if (!$category) {
                $this->validator->addError('category_id', 'Category does not exist');
            }

            if ($propertiesIds && count($propertiesIds) != $properties->count()) {
                $this->validator->addError('properties', 'One or more properties don\'t exist');
            }

            if ($this->validator->isValid()) {
                $product->name = $request->getParam('name');
                $product->save();

                $product->categories()->detach();
                $product->categories()->attach($category);

                $product->properties()->detach();
                if ($properties) {
                    $product->properties()->attach($properties);
                }

                $this->flash('success', 'Product "' . $product->name . '" edited');
                return $this->redirect($response, 'product.get');
            }
        }

        return $this->view->render($response, 'Product/edit.twig', [
            'product' => $product,
            'categories' => Category::all(),
            'properties' => Property::all()
        ]);
    }

    /**
     * Delete product
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     * @throws \Slim\Exception\NotFoundException
     */
    public function delete(Request $request, Response $response, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            throw $this->notFoundException($request, $response);
        }

        foreach ($product->items as $item) {
            $item->product()->dissociate();
            $item->save();
        }

        $product->properties()->detach();
        $product->categories()->detach();
        $product->delete();

        $this->flash('success', 'Product "' . $product->name . '" deleted');
        return $this->redirect($response, 'product.get');
    }

    /**
     * Get products list
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function get(Request $request, Response $response)
    {
        return $this->view->render($response, 'Product/get.twig', [
            'products' => Product::all()
        ]);
    }
}
