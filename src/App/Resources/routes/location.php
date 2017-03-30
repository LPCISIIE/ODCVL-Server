<?php

$app->group('/locations', function () {
    $this->get('', 'LocationController:getCollection')->setName('get_locations');
    $this->get('/{id:[0-9]+}', 'LocationController:get')->setName('get_location');
    $this->post('', 'LocationController:post')->setName('post_location');
    $this->put('/{id:[0-9]+}', 'LocationController:put')->setName('put_location');
    $this->delete('/{id:[0-9]+}', 'LocationController:delete')->setName('delete_location');
    $this->put('/activation/{id:[0-9]+}', 'LocationController:activate')->setName('activate_location');
    $this->get('/{id:[0-9]+}/items', 'LocationController:getItemsLocation')->setName('get_items_location');
})->add(new \App\Middleware\AuthMiddleware($container, 'admin'));
