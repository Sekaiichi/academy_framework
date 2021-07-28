<?php


namespace Framework\Http;


class RequestFactory
{
    public static function fromGlobals(array $query = [], ?array $body = []): Request
    {
        return (new Request())
            ->withQueryParams($query ?: $_GET)
            ->withParsedBody($body ?: $_POST);
    }

}
