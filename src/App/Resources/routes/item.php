<?php

$app->group('/items', function () {
    $this->map(['GET', 'POST'], '/add', 'ItemController:add')->setName('item.add');
    $this->map(['GET', 'POST'], '/{id:[0-9]+}/edit', 'ItemController:edit')->setName('item.edit');
    $this->get('/{id:[0-9]+}/delete', 'ItemController:delete')->setName('item.delete');
    $this->get('', 'ItemController:get')->setName('item.get');
});
