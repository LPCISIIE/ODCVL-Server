<?php

namespace App\Controller;

use App\Model\Category;
use Respect\Validation\Validator as V;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class CategoryController extends Controller
{
    const ITEMS_PER_PAGE = 3;

    /**
     * Get categories list
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function getCollection(Request $request, Response $response)
    {
        $page = $request->getParam('page') ? (int) $request->getParam('page') : 0;

        $categories = Category::with('subCategories')
            ->where('parent_id', null);

        if ($page) {
            $count = Category::where('parent_id', null)->count();

            $categories = $categories
                ->take(self::ITEMS_PER_PAGE)
                ->skip(self::ITEMS_PER_PAGE * ($page - 1))
                ->get();

            $response = $response->withHeader(
                'Content-Range',
                'resources ' . (self::ITEMS_PER_PAGE * ($page - 1)) . '-' . $categories->count() . '/' . $count
            );
        } else {
            $categories = $categories->get();
        }
        
        return $this->ok($response, $categories);
    }

    /**
     * Get one category
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     */
    public function get(Request $request, Response $response, $id)
    {
        $category = Category::with('subCategories')->find($id);

        if (null === $category) {
            throw $this->notFoundException($request, $response);
        }

        return $this->ok($response, $category);
    }

    /**
     * Add category
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function post(Request $request, Response $response)
    {
        $this->validator->validate($request, ['name' => V::notBlank()], [
            'notBlank' => 'Veuillez donner un nom à la catégorie'
        ]);

        $parent = null;
        if ($request->getParam('parent_id')) {
            $parent = Category::find($request->getParam('parent_id'));

            if (null === $parent) {
                $this->validator->addError('parent_id', 'La catégorie parente n\'existe pas');
            } elseif ($parent->parent_id) {
                $this->validator->addError('parent_id', 'Vous ne pouvez pas ajouter de catégories à une sous-catégorie');
            }
        }

        if ($this->validator->isValid()) {
            $category = new Category(['name' => $request->getParam('name')]);

            if ($parent) {
                $category->parent()->associate($parent);
            }

            $category->save();

            return $this->created($response, 'get_category', [
                'id' => $category->id
            ]);
        }

        return $this->validationErrors($response);
    }

    /**
     * Edit category
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     */
    public function put(Request $request, Response $response, $id)
    {
        $category = Category::find($id);

        if (null === $category) {
            throw $this->notFoundException($request, $response);
        }

        $this->validator->validate($request, ['name' => V::notBlank()], [
            'notBlank' => 'Veuillez donner un nom à la catégorie'
        ]);

        $parent = null;
        if ($request->getParam('parent_id')) {
            $parent = Category::find($request->getParam('parent_id'));

            if (null === $parent) {
                $this->validator->addError('parent_id', 'La catégorie parente n\'existe pas');
            } elseif ($parent->parent_id) {
                $this->validator->addError('parent_id', 'Vous ne pouvez pas ajouter de catégories à une sous-catégorie');
            }
        }

        if ($this->validator->isValid()) {
            $category->name = $request->getParam('name');

            if ($parent) {
                $category->parent()->associate($parent);
            } else {
                $category->parent()->dissociate();
            }

            $category->save();

            return $this->noContent($response);
        }

        return $this->validationErrors($response);
    }

    /**
     * Delete category
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     */
    public function delete(Request $request, Response $response, $id)
    {
        $category = Category::find($id);

        if (null === $category) {
            throw $this->notFoundException($request, $response);
        }

        foreach ($category->subCategories as $subCategory) {
            $subCategory->parent()->dissociate();
            $subCategory->save();
        }

        $category->products()->detach();

        $category->delete();

        return $this->noContent($response);
    }

    public function getCategoryProducts(Request $request, Response $response, $id)
    {
        $category = Category::with(['products.categories', 'subCategories.products.categories'])->find($id);

        if (null === $category) {
            throw $this->notFoundException($request, $response);
        }

        $category = $category->toArray();

        $products = $category['products'];
        foreach ($category['sub_categories'] as $subCategory) {
            $products = array_merge($products, $subCategory['products']);
        }

        return $this->ok($response, $products);
    }
}
