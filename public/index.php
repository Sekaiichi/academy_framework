<?php

use App\Http\Action;
use Framework\Http\Router\Exception\RequestNotMatchedException;
use Framework\Http\Router\RouteCollection;
use Framework\Http\Router\Router;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\ServerRequestFactory;

require_once __DIR__ . "/../vendor/autoload.php";

### Initialization

$routes = new RouteCollection();

    $routes->get('home', '/', new Action\HelloAction());
    $routes->get('about', '/about', new Action\AboutAction());
    $routes->get('blog', '/blog', new Action\Blog\IndexAction());
    $routes->get('blog_show', '/blog/{id}', new Action\Blog\ShowAction(), ['id' => '\d+']);

$router = new Router($routes);

### Running

$request = ServerRequestFactory::fromGlobals();
try {
    $result = $router->match($request);
    foreach ($result->getAttributes() as $attribute => $value) {
        $request = $request->withAttribute($attribute, $value);
    }
    /** @var callable $action */
    $action = $result->getHandler();
    $response = $action($request);
} catch (RequestNotMatchedException $e){
    $response = new HtmlResponse('Undefined page', 404);
}


### Sending
$a= new \Framework\Http\ResponseSender();
$a->send($response);


