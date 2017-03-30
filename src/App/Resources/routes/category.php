<?php

$app->group('/categories', function () {
    $this->get('', 'CategoryController:getCollection')->setName('get_categories');
    $this->get('/{id:[0-9]+}', 'CategoryController:get')->setName('get_category');
    $this->post('', 'CategoryController:post')->setName('post_category');
    $this->put('/{id:[0-9]+}', 'CategoryController:put')->setName('put_category');
    $this->delete('/{id:[0-9]+}', 'CategoryController:delete')->setName('delete_category');

    $this->get('/{id:[0-9]+}/products', 'CategoryController:getCategoryProducts')->setName('get_category_products');
})->add(new \App\Middleware\AuthMiddleware($container, 'admin'));
