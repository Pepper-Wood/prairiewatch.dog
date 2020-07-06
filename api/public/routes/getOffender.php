<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Psr7\Response;
use Symfony\Component\Yaml\Yaml;

$app->get('/v0/offender/{uuid}', function (Request $request, ResponseInterface $response, $args): ResponseInterface {
    $url = "https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/database/offenders/" . $args["uuid"] . ".yml";
    $headers = @get_headers($url);
    if (!$headers || !strpos($headers[0],'200')) {
        $error = ["error" => "UUID for offender not found."];
        $response->getBody()->write(json_encode($error));
        return $response->withStatus(404)
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    }
    $url_text = file_get_contents($url);
    $offender = Yaml::parse($url_text);
    $example = [
        "offender" => $offender
    ];
    $response->getBody()->write(json_encode($example));
    return $response->withStatus(200)
        ->withHeader('Content-Type', 'application/json')
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});
