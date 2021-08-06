<?php


namespace Framework\Http\Router\Exception;

class RequestNotMatchedException extends \LogicException
{
    private $request;

    public function __construct(\Psr\Http\Message\ServerRequestInterface $request)
    {
        parent::__construct('Matches not found');
        $this->request = $request;
    }

    public function getRequest(): \Psr\Http\Message\ServerRequestInterface
    {
        return $this->request;
    }
}
