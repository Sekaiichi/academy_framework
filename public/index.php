<?php

use Framework\Http\Request;

require_once __DIR__ . "/../vendor/autoload.php";

$request = (new Request())
    ->withQueryParams($_GET)
    ->withParsedBody($_POST);

dd($request->getQueryParams());
