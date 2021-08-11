<?php


namespace App\Http\Action\User;



use App\Http\Action\Action;
use App\Models\User;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

class ShowAction extends Action
{
    public function __invoke(ServerRequestInterface $request)
    {
        $id = $request->getAttribute('id');

        $user = User::find($id);

        return $this->JsonResponse(['users' => $users]);
    }
}
