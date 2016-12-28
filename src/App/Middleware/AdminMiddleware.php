<?php

namespace App\Middleware;

class AdminMiddleware extends Middleware
{
    public function __invoke($request, $response, $next)
    {
        if (!$this->auth->check() || !$this->auth->getUser()->inRole('admin')) {
            $this->flash->addMessage('danger', 'This area is restricted to Administrators!');
            return $response->withRedirect($this->router->pathFor('home'));
        }

        return $next($request, $response);
    }
}