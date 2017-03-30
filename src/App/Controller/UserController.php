<?php

namespace App\Controller;

use App\Model\User;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class UserController extends Controller
{
    public function getCollection(Request $request, Response $response)
    {
        return $this->ok($response, User::with('roles')->get());
    }

    public function delete(Request $request, Response $response, $id)
    {
        $user = User::find($id);

        if (null === $user) {
            throw $this->notFoundException($request, $response);
        }

        $user->activations()->delete();
        $user->roles()->detach();
        $user->delete();

        return $this->noContent($response);
    }

    public function promote(Request $request, Response $response, $id)
    {
        $user = User::find($id);

        if (null === $user) {
            throw $this->notFoundException($request, $response);
        }

        $role = $this->sentinel->findRoleByName('Admin');

        $user->roles()->attach($role);

        return $this->noContent($response);
    }

    public function demote(Request $request, Response $response, $id)
    {
        $user = User::find($id);

        if (null === $user) {
            throw $this->notFoundException($request, $response);
        }

        $role = $this->sentinel->findRoleByName('Admin');

        $user->roles()->detach($role);

        return $this->noContent($response);
    }
}
