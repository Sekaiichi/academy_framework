<?php


namespace App\Http\Action\User;



use App\Models\User;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

class ShowAction
{
    public function __invoke(ServerRequestInterface $request)
    {
        $id = $request->getAttribute('id');

        $user = User::find($id);

        return new JsonResponse(['user' => $user]);
    }
}
