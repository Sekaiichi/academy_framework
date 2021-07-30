<?php

use Framework\Http\Action\SiteAction;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\JsonResponse;
use Laminas\Diactoros\ServerRequestFactory;
use Psr\Http\Message\ServerRequestInterface;

require_once __DIR__ . "/../vendor/autoload.php";

### Initialization
$request = ServerRequestFactory::fromGlobals();

### Action

$path = $request->getUri()->getPath();

$action = null;

if ($path === '/') {

    $action = function (ServerRequestInterface $request) {
        return (new SiteAction())->actionIndex($request);
    };

} elseif ($path === '/about') {

    $action = function (ServerRequestInterface $request) {
        return (new SiteAction())->actionAbout($request);
    };

} elseif ($path === '/blog') {

    $action = function () {
        return new JsonResponse([
            ['id' => 2, 'title' => 'The Second Post'],
            ['id' => 1, 'title' => 'The First Post'],
        ]);
    };

} elseif (preg_match('#^/blog/(?P<id>\d+)$#i', $path, $matches)) {

    $request = $request->withAttribute('id', $matches['id']);

    $action = function (ServerRequestInterface $request) {
        $id = $request->getAttribute('id');
        if ($id > 2) {
            return new JsonResponse(['error' => 'Undefined page'], 404);
        }
        return new JsonResponse(['id' => $id, 'title' => 'Post #' . $id]);
    };
}

if ($action) {
    $response = $action($request);
} else {
    $response = new HtmlResponse('Undefined page', 404);
}

### Sending
$a= new \Framework\Http\ResponseSender();
$a->send($response);

