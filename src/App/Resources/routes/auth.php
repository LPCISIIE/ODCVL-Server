<?php

$app->group('', function () use ($container) {
    $this->post('/register', 'AuthController:register')->setName('register');
    $this->post('/login', 'AuthController:login')->setName('login');
    $this->get('/users/me', 'AuthController:me')
        ->add(new App\Middleware\AuthMiddleware($container))
        ->setName('users.me');
});
