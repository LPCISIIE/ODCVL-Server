<?php

$app->group('/categories', function () {
    $this->map(['GET', 'POST'], '/add', 'CategoryController:add')->setName('category.add');
    $this->map(['GET', 'POST'], '/{id:[0-9]+}/edit', 'CategoryController:edit')->setName('category.edit');
    $this->get('/{id:[0-9]+}/delete', 'CategoryController:delete')->setName('category.delete');
    $this->get('', 'CategoryController:get')->setName('category.get');
});
