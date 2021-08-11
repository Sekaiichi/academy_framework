<?php

namespace App\Traits;

use Laminas\Diactoros\Response\JsonResponse;

trait Responser
{
    private function meta(int $code = 200, $message = null, bool $error = false): array
    {
        return [
            'meta' => [
                'error' => $error,
                'message' => $message,
                'statusCode' => $code,
            ]
        ];
    }

    /**
     * Building  response
     * @param int $code
     * @param null $message
     * @param array $response
     * @return JsonResponse
     */
    public function JsonResponse(array $response = [], int $code = 200, $message = null): JsonResponse
    {
        $response = $this->meta($code, $message) + ['response' => $response];
        return new JsonResponse([$response], $code);
    }

}
