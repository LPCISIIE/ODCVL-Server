<?php

$app->map(['GET', 'POST'], '/items/add', 'ItemController:add')->setName('item.add');
$app->map(['GET', 'POST'], '/items/{id:[0-9]+}/edit', 'ItemController:edit')->setName('item.edit');
$app->get('/items/{id:[0-9]+}/delete', 'ItemController:delete')->setName('item.delete');
$app->get('/items', 'ItemController:get')->setName('item.get');
