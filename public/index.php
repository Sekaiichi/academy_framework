<?php

use Framework\Http\RequestFactory;

require_once __DIR__ . "/../vendor/autoload.php";

$request = RequestFactory::fromGlobals();

dd($request->getQueryParams(), $request->getParsedBody());


