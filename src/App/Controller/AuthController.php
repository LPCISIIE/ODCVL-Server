<?php

namespace App\Controller;

use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator as V;

class AuthController extends Controller
{
    public function login(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $credentials = [
                'username' => $request->getParam('username'),
                'password' => $request->getParam('password')
            ];
            $remember = $request->getParam('remember') ? true : false;

            try {
                if ($this->auth->authenticate($credentials, $remember)) {
                    $this->flash('success', 'Vous êtes maintenant connecté.');
                    return $this->redirect($response, 'home');
                } else {
                    $this->flash('danger', 'Mauvais nom d\'utilisateur ou mot de passe.');
                }
            } catch (ThrottlingException $e) {
                $this->flash('danger', 'Trop de connexions!');
            }

            return $this->redirect($response, 'login');
        }

        return $this->view->render($response, 'Auth/login.twig');
    }

    public function register(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $username = $request->getParam('username');
            $email = $request->getParam('email');
            $password = $request->getParam('password');

            $this->validator->validate($request, [
                'username' => V::length(6, 25)->alnum('_')->noWhitespace(),
                'email' => V::noWhitespace()->email(),
                'password' => V::noWhitespace()->length(6, 25),
                'password-confirm' => V::equals($password)
            ]);

            if ($this->auth->findByCredentials(['login' => $username])) {
                $this->validator->addError('username', 'Un utilisateur existe déjà avec ce nom.');
            }

            if ($this->auth->findByCredentials(['login' => $email])) {
                $this->validator->addError('email', 'Un utilisateur existe déjà avec cette adresse email.');
            }

            if ($this->validator->isValid()) {
                $role = $this->auth->findRoleByName('User');

                $user = $this->auth->registerAndActivate([
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'permissions' => [
                        'user.delete' => 0
                    ]
                ]);

                $role->users()->attach($user);

                $this->flash('success', 'Vous compte a été créé.');
                return $this->redirect($response, 'login');
            }
        }

        return $this->view->render($response, 'Auth/register.twig');
    }

    public function logout(Request $request, Response $response)
    {
        $this->auth->logout();

        $this->flash('success', 'Vous avec été déconnecté.');
        return $this->redirect($response, 'home');
    }
}
