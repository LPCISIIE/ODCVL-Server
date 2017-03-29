<?php

$app->group('/products', function () {
    $this->get('', 'ProductController:getCollection')->setName('get_products');
    $this->get('/{id:[0-9]+}', 'ProductController:get')->setName('get_product');
    $this->post('', 'ProductController:post')->setName('post_product');
    $this->put('/{id:[0-9]+}', 'ProductController:put')->setName('put_product');
    $this->delete('/{id:[0-9]+}', 'ProductController:delete')->setName('delete_product');
})->add(new \App\Middleware\AuthMiddleware($container, 'Admin'));
