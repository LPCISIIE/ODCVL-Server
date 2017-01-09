<?php

$app->group('/products', function () {
    $this->map(['GET', 'POST'], '/add', 'ProductController:add')->setName('product.add');
    $this->map(['GET', 'POST'], '/{id:[0-9]+}/edit', 'ProductController:edit')->setName('product.edit');
    $this->get('/{id:[0-9]+}/delete', 'ProductController:delete')->setName('product.delete');

    $this->get('/{id:[0-9]+}/properties', 'ProductController:getProperties')->setName('product.properties');

    $this->get('', 'ProductController:get')->setName('product.get');
});
