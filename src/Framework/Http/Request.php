<?php

namespace Framework\Http;


class Request
{
    public function getQueryParams(): array
    {
        return $_GET['sss'];
    }

    public function getParsedBody(): ?array
    {
        return $_POST ?: null;
    }
}
