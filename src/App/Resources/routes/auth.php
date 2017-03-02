<?php

$app->group('', function () use ($container) {
    $this->post('/register', 'AuthController:register')->setName('register');
    $this->post('/login', 'AuthController:login')->setName('login');
    $this->post('/auth/refresh', 'AuthController:refresh')->setName('jwt.refresh');
    $this->get('/users/me', 'AuthController:me')
        ->add(new App\Middleware\AuthMiddleware($container))
        ->setName('users.me');
});
