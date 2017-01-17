<?php

namespace App\Controller;

use App\Model\Category;
use App\Model\Property;
use Respect\Validation\Validator as V;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class CategoryController extends Controller
{
    /**
     * Add category
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function add(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $this->validator->validate($request, ['name' => V::notBlank()], [
                'notBlank' => 'Veuillez donner un nom à la catégorie'
            ]);

            $parent = null;
            if ($request->getParam('parent_id')) {
                $parent = Category::find($request->getParam('parent_id'));

                if (!$parent) {
                    $this->validator->addError('parent_id', 'La catégorie parente n\'existe pas');
                } elseif ($parent->parent_id) {
                    $this->validator->addError('parent_id', 'Vous ne pouvez pas ajouter de catégories à une sous-catégorie');
                }
            }

            $propertiesIds = $request->getParam('properties');
            $requiredIds = $request->getParam('required');
            $properties = $propertiesIds ? Property::whereIn('id', $propertiesIds)->get() : null;

            if ($propertiesIds && count($propertiesIds) != $properties->count()) {
                $this->validator->addError('properties', 'Une ou plusieurs propriétés n\'existent pas');
            }

            if ($this->validator->isValid()) {
                $category = new Category(['name' => $request->getParam('name')]);

                if ($parent) {
                    $category->parent()->associate($parent);
                }

                $category->save();

                foreach ($properties as $property) {
                    if (in_array($property->id, $requiredIds)) {
                        $category->properties()->attach($property, ['required' => true]);
                    } else {
                        $category->properties()->attach($property);
                    }
                }

                $this->flash('success', 'Catégorie "' . $category->name . '" ajoutée');
                return $this->redirect($response, 'category.get');
            }
        }

        return $this->view->render($response, 'Category/add.twig', [
            'categories' => Category::whereDoesntHave('parent')->get(),
            'properties' => Property::all()
        ]);
    }

    /**
     * Edit category
     *
     * @param Request $request
     * @param Response $response
     * @param string $id
     * @return Response
     */
    public function edit(Request $request, Response $response, $id)
    {
        $category = Category::with('properties')->find($id);

        if (!$category) {
            throw $this->notFoundException($request, $response);
        }

        if ($request->isPost()) {
            $this->validator->validate($request, ['name' => V::notBlank()], [
                'notBlank' => 'Veuillez donner un nom à la catégorie'
            ]);

            $parent = null;
            if ($request->getParam('parent_id')) {
                $parent = Category::find($request->getParam('parent_id'));

                if (!$parent) {
                    $this->validator->addError('parent_id', 'La catégorie parente n\'existe pas');
                } elseif ($parent->parent_id) {
                    $this->validator->addError('parent_id', 'Vous ne pouvez pas ajouter de catégories à une sous-catégorie');
                }
            }

            $propertiesIds = $request->getParam('properties');
            $requiredIds = $request->getParam('required');
            $properties = $propertiesIds ? Property::whereIn('id', $propertiesIds)->get() : null;

            if ($propertiesIds && count($propertiesIds) != $properties->count()) {
                $this->validator->addError('properties', 'Une ou plusieurs propriétés n\'existent pas');
            }

            if ($this->validator->isValid()) {
                $category->name = $request->getParam('name');

                if ($parent) {
                    $category->parent()->associate($parent);
                } else {
                    $category->parent()->dissociate();
                }

                $category->save();

                $newProperties = [];
                foreach ($properties as $property) {
                    if (in_array($property->id, $requiredIds)) {
                        $newProperties[$property->id] = ['required' => true];
                    } else {
                        $newProperties[] = $property->id;
                    }
                }

                if ($properties) {
                    $category->properties()->sync($newProperties);
                }

                $this->flash('success', 'Catégorie "' . $category->name . '" modifiée');
                return $this->redirect($response, 'category.get');
            }
        }

        return $this->view->render($response, 'Category/edit.twig', [
            'categories' => Category::whereDoesntHave('parent')->get(),
            'category' => $category,
            'properties' => Property::all()
        ]);
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

        if (!$category) {
            throw $this->notFoundException($request, $response);
        }

        foreach ($category->subCategories as $subCategory) {
            $subCategory->parent()->dissociate();
            $subCategory->save();
        }

        $category->products()->detach();
        $category->properties()->detach();

        $category->delete();

        $this->flash('success', 'Catégorie "' . $category->name . '" supprimée');
        return $this->redirect($response, 'category.get');
    }

    /**
     * Get categories list
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function get(Request $request, Response $response)
    {
        $categories = Category::with('subCategories')->where('parent_id', null)->get();

        return $this->view->render($response, 'Category/get.twig', [
            'categories' => $categories
        ]);
    }
}
