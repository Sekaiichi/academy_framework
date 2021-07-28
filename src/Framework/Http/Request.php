<?php

namespace Framework\Http;


class Request
{
    public array $queryParams;
    public ?array $parsedBody;

    public function __construct(array $queryParams = [], ?array $parsedBody = null)
    {
        $this->queryParams = $queryParams;
        $this->parsedBody = $parsedBody;
    }
    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    public function getParsedBody(): ?array
    {
        return $this->parsedBody;
    }

    public function withQueryParams(array $query): self
    {
        $new = clone $this;
        $this->queryParams = $query;
        return $new;
    }

    public function withParsedBody($data): self
    {
        $new = clone $this;
        $this->parsedBody = $data;
        return $new;
    }
}
