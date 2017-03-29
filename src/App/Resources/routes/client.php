<?php

$app->group('/clients', function () {
    $this->get('', 'ClientController:getCollection')->setName('get_clients');
    $this->get('/{id:[0-9]+}', 'ClientController:get')->setName('get_client');
    $this->post('', 'ClientController:post')->setName('post_client');
    $this->put('/{id:[0-9]+}', 'ClientController:put')->setName('put_client');
    $this->delete('/{id:[0-9]+}', 'ClientController:delete')->setName('delete_client');
})->add(new \App\Middleware\AuthMiddleware($container, 'Admin'));
