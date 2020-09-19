<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Symfony\Component\Yaml\Yaml;

class ApiController
{
    protected function format_response($response, $array, $status): Response {
        $response->getBody()->write(json_encode($array));
        return $response->withStatus($status)
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    }

    /**
     * @param Request  $request
     * @param Response $response
     *
     * @return Response
     */
    public function info(Request $request, Response $response): Response {
        $example = [
            "status" => "This is the base URL."
        ];
        return $this->format_response($response, $example, 200);
    }

    /**
     * @param Request  $request
     * @param Response $response
     *
     * @return Response
     */
    public function status(Request $request, Response $response): Response {
        $example = [
            "status" => "Success! API is up, and the automated deploy process works, maybe?"
        ];
        return $this->format_response($response, $example, 200);
    }
}
