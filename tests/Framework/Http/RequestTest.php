<?php
namespace Tests\Framework\Http;


use Framework\Http\Request;
use Framework\Http\RequestFactory;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    public function testEmpty(): void
    {
        $request = RequestFactory::fromGlobals([], null);

        self::assertEquals([], $request->getQueryParams());
        self::assertEquals([], $request->getParsedBody());
    }

    public function testQueryParams(): void
    {
        $request = RequestFactory::fromGlobals($data = [
            'name' => 'John',
            'age' => 28,
        ]);

        self::assertEquals($data, $request->getQueryParams());
        self::assertEquals([], $request->getParsedBody());
    }

    public function testParsedBody(): void
    {
        $request = RequestFactory::fromGlobals([], $data = ["Title" => "title"]);

        self::assertEquals([], $request->getQueryParams());
        self::assertEquals($data, $request->getParsedBody());
    }

}
