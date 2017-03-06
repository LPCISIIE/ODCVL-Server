<?php

$app->group('/items', function () {
    $this->get('', 'ItemController:getCollection')->setName('get_items');
    $this->get('/{id:[0-9]+}', 'ItemController:get')->setName('get_item');
    $this->get('/barcode/{code:[0-9]+}', 'ItemController:getByCode')->setName('get_item_code');
    $this->post('', 'ItemController:post')->setName('post_item');
    $this->put('/{id:[0-9]+}', 'ItemController:put')->setName('put_item');
    $this->delete('/{id:[0-9]+}', 'ItemController:delete')->setName('delete_item');
});
