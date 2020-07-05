<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Psr7\Response;
use SleekDB\SleekDB;

$app->get('/v0/offenders/{site}', function (Request $request, ResponseInterface $response, $args): ResponseInterface {
  if ($args["site"] == "twitter") {
      $example = [
          ["lularoe" => "0680b520-0252-440f-953c-fcec27740a45"],
          ["noahbradley" => "4ed9aad9-a070-4fc4-9f9c-cfd87756e72d"]
      ];
      $example = [
          "offenders" => $example
      ];
      $response->getBody()->write(json_encode($example));
      return $response->withStatus(200)
          ->withHeader('Content-Type', 'application/json')
          ->withHeader('Access-Control-Allow-Origin', '*')
          ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
          ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
  } else if ($args["site"] == "websites") {
      $example = [
          "lularoe.com" => "0680b520-0252-440f-953c-fcec27740a45",
          "noahbradley.com" => "4ed9aad9-a070-4fc4-9f9c-cfd87756e72d"
      ];
      $example = [
          "offenders" => $example
      ];
      $response->getBody()->write(json_encode($example));
      return $response->withStatus(200)
          ->withHeader('Content-Type', 'application/json')
          ->withHeader('Access-Control-Allow-Origin', '*')
          ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
          ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
  }
  $error = ["error" => "Site argument not recognized."];
  $response->getBody()->write(json_encode($error));
  return $response->withStatus(404)
      ->withHeader('Content-Type', 'application/json')
      ->withHeader('Access-Control-Allow-Origin', '*')
      ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
      ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});
