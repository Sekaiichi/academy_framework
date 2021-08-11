<?php


namespace App\Http\Action\User;


use App\Http\Action\Action;
use App\Models\User;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

class StoreAction extends Action
{
    public function __invoke(ServerRequestInterface $request): JsonResponse
    {
        $parsedBody = $request->getParsedBody();

        $users = new User();
            $users->email = $parsedBody['email'];
            $users->first_name = $parsedBody['first_name'];
            $users->last_name = $parsedBody['last_name'];
            $users->password = $parsedBody['password'];
        $users->save();

        return $this->JsonResponse(['users' => $users]);
    }
}
