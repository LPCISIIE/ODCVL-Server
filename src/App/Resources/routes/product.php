<?php

$app->map(['GET', 'POST'], '/products/add', 'ProductController:add')->setName('product.add');
$app->map(['GET', 'POST'], '/products/{id:[0-9]+}/edit', 'ProductController:edit')->setName('product.edit');
$app->get('/products/{id:[0-9]+}/delete', 'ProductController:delete')->setName('product.delete');
$app->get('/products/{id:[0-9]+}', 'ProductController:show')->setName('product.show');
$app->get('/products', 'ProductController:get')->setName('product.get');
