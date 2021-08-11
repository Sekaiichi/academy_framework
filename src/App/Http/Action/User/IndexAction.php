<?php


namespace App\Http\Action\User;

use App\Http\Action\Action;
use App\Models\User;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

class IndexAction extends Action
{
    public function __invoke(ServerRequestInterface $request): JsonResponse
    {
        $users = User::get();

        return $this->JsonResponse(['users' => $users]);
    }
}

