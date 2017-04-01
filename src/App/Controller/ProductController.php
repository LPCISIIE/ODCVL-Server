<?php

namespace App\Controller;

use App\Model\Category;
use App\Model\Product;
use Respect\Validation\Validator as V;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ProductController extends Controller
{
    const ITEMS_PER_PAGE = 3;

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

        $count = Product::count();

        $products = Product::with(['categories', 'items'])
            ->take(self::ITEMS_PER_PAGE)
            ->skip(self::ITEMS_PER_PAGE * ($page - 1))
            ->get();

        $response = $response->withHeader(
            'Content-Range',
            'resources ' . (self::ITEMS_PER_PAGE * ($page - 1)) . '-' . $products->count() . '/' . $count
        );

        return $this->ok($response, $products);
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
        $product = Product::with('categories')->find($id);

        if (null === $product) {
            throw $this->notFoundException($request, $response);
        }

        return $this->ok($response, $product);
    }

    /**
     * Add product
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function post(Request $request, Response $response)
    {
        $this->validator->validate($request, [
            'name' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Veuillez donner un nom au produit'
                ]
            ],
            'category_id' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Veuillez sélectionner une catégorie'
                ]
            ],
            'prix' => [
                'rules' => V::numeric(),
                'messages' => [
                    'numeric' => 'Veuillez saisir un prix valide'
                ]
            ]
        ]);

        if ($request->getParam('category_id')) {
            $category = Category::find($request->getParam('category_id'));

            if (null === $category) {
                $this->validator->addError('category_id', 'La catégorie n\'existe pas');
            }
        }

        if ($this->validator->isValid()) {
            $product = new Product([
                'name' => $request->getParam('name'),
                'prix' => $request->getParam('prix')
            ]);

            $product->save();
            $product->categories()->attach($category);

            return $this->created($response, 'get_product', [
                'id' => $product->id
            ]);
        }

        return $this->validationErrors($response);
    }

    /**
     * Edit product
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     */
    public function put(Request $request, Response $response, $id)
    {
        $product = Product::with('categories')->find($id);

        if (null === $product) {
            throw $this->notFoundException($request, $response);
        }

        $this->validator->validate($request, [
            'name' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Veuillez donner un nom au produit'
                ]
            ],
            'category_id' => [
                'rules' => V::notBlank(),
                'messages' => [
                    'notBlank' => 'Veuillez sélectionner une catégorie'
                ]
            ],
            'prix' => [
                'rules' => V::numeric(),
                'messages' => [
                    'numeric' => 'Veuillez saisir un prix valide'
                ]
            ]
        ]);

        if ($request->getParam('category_id')) {
            $category = Category::find($request->getParam('category_id'));

            if (null === $category) {
                $this->validator->addError('category_id', 'La catégorie n\'existe pas');
            }
        }

        if ($this->validator->isValid()) {
            $product->name = $request->getParam('name');
            $product->save();

            $product->categories()->sync([$category->id]);

            return $this->noContent($response);
        }

        return $this->validationErrors($response);
    }

    /**
     * Delete product
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     */
    public function delete(Request $request, Response $response, $id)
    {
        $product = Product::find($id);

        if (null === $product) {
            throw $this->notFoundException($request, $response);
        }

        $product->items()->delete();
        $product->categories()->detach();
        $product->delete();

        return $this->noContent($response);
    }
}
