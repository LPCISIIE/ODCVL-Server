<?php

$app->map(['GET', 'POST'], '/categories/add', 'CategoryController:add')->setName('category.add');
$app->map(['GET', 'POST'], '/categories/{id:[0-9]+}/edit', 'CategoryController:edit')->setName('category.edit');
$app->get('/categories/{id:[0-9]+}/delete', 'CategoryController:delete')->setName('category.delete');
$app->get('/categories', 'CategoryController:get')->setName('category.get');
