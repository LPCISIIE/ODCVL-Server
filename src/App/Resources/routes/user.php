<?php

use App\Middleware\AuthMiddleware;

$app->group('/users', function () {
    $this->get('', 'UserController:getCollection')->setName('get_users');
    $this->delete('/{id:[0-9]+}', 'UserController:delete')->setName('delete_user');
    $this->put('/{id:[0-9]+}/promote', 'UserController:promote')->setName('promote_user');
    $this->put('/{id:[0-9]+}/demote', 'UserController:demote')->setName('demote_user');
})->add(new AuthMiddleware($container, 'admin'));
