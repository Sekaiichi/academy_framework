<?php


namespace App\Http\Action\User;

use App\Models\User;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

class IndexAction
{
    public function __invoke(ServerRequestInterface $request): JsonResponse
    {
        $users = User::get();

        return new JsonResponse(['users' => $users]);
    }
}

