<?php


namespace App\Http\Action\User;


use App\Models\User;
use App\Traits\Responser;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

class UpdateAction
{
    use Responser;

    public function __invoke(ServerRequestInterface $request): JsonResponse
    {
        $id = $request->getAttribute('id');
        $parsedBody = $request->getParsedBody();

        $user = User::find($id);
            $user->first_name =  $parsedBody['first_name'];
            $user->last_name =  $parsedBody['last_name'];
        $user->save();

        return $this->JsonResponse(['user' => $user]);
    }
}
