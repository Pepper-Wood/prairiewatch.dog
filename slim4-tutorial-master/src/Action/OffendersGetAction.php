<?php

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * Action
 */
final class OffendersGetAction
{
    /**
     * Invoke.
     *
     * @param ServerRequestInterface $request The request
     * @param ResponseInterface $response The response
     * @param array $args The route arguments
     *
     * @throws ValidationException
     *
     * @return ResponseInterface The response
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args = []
    ): ResponseInterface {
        $url = "https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/database/offenders/" . $args["uuid"] . ".yml";
        $headers = @get_headers($url);
        if (!$headers || !strpos($headers[0],'200')) {
            $result = ['error' => ['message' => 'Offender UUID for offender not found.']];
            $response->getBody()->write(json_encode($result));

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(404);
        }
        
        $url_text = file_get_contents($url);
        $offender = Yaml::parse($url_text);
        $response->getBody()->write((string)json_encode($offender));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
