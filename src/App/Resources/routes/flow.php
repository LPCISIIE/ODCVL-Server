<?php

$app->group('/flows', function () {
    $this->get('', 'FlowController:getCollection')->setName('get_flows');
    $this->get('/{id:[0-9]+}', 'FlowController:get')->setName('get_flow');
    $this->post('', 'FlowController:post')->setName('post_flow');
    $this->put('/{id:[0-9]+}', 'FlowController:put')->setName('put_flow');
    $this->delete('/{id:[0-9]+}', 'FlowController:delete')->setName('delete_flow');
})->add(new \App\Middleware\AuthMiddleware($container, 'admin'));