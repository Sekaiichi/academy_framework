<?php

use Framework\Http\RequestFactory;
use Framework\Http\Response;

require_once __DIR__ . "/../vendor/autoload.php";

$request = RequestFactory::fromGlobals();

$response = new Response('body');

dd( $response->getBody(), $response->getStatusCode(),  $response->getReasonPhrase());
