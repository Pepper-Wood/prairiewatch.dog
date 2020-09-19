<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Symfony\Component\Yaml\Yaml;

class OffendersController
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
    public function getOffender(Request $request, Response $response, $args): Response {
        $url = "https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/database/offenders/" . $args["uuid"] . ".yml";
        $headers = @get_headers($url);
        if (!$headers || !strpos($headers[0],'200')) {
            $error = [
                "error" => [
                    "status" => 404,
                    "message" => "Offender UUID for offender not found."
                ]
            ];
            return $this->format_response($response, $error, 404);
        }
        $url_text = file_get_contents($url);
        $offender = Yaml::parse($url_text);
        return $this->format_response($response, $offender, 200);
    }
}
