<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Psr7\Response;
use Symfony\Component\Yaml\Yaml;

$app->get('/v0/offenders', function (Request $request, ResponseInterface $response, $args): ResponseInterface {
    $result = [];
    $params = $request->getQueryParams();
    if (array_key_exists("twitter", $params)) {
        $url_text = file_get_contents("https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/database/listing/twitter.yml");
        $twitter_handles = Yaml::parse($url_text);
        $handles = explode(",", $params["twitter"]);
        foreach ($handles as $handle) {
            if (array_key_exists($handle, $twitter_handles)) {
                $url_offender = "https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/database/offenders/" . $twitter_handles[$handle] . ".yml";
                $url_text = file_get_contents($url_offender);
                $result[] = Yaml::parse($url_text);
            }
        }
    }
    if (array_key_exists("url", $params)) {
        $url_text = file_get_contents("https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/database/listing/websites.yml");
        $websites_list = Yaml::parse($url_text);
        $url_param = $params["url"];
        $url_matches = array_filter($websites_list, function($url_key) use($url_param) {
            // return true if url_key is a substring of the url_param
            // i.e., param might be https://lularoe.com/products/amelia
            //       key would be lularoe.com
            return (strpos($url_param, $url_key) !== false);
        }, ARRAY_FILTER_USE_KEY);
        var_dump($url_matches);
        foreach ($url_matches as $url_match) {
            var_dump($url_match);
            $url_offender = "https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/database/offenders/" . $websites_list[$url_match] . ".yml";
            $url_text = file_get_contents($url_offender);
            $result[] = Yaml::parse($url_text);
        }
    }
    $example = [
        "offenders" => $result
    ];
    $response->getBody()->write(json_encode($example));
    return $response->withStatus(200)
        ->withHeader('Content-Type', 'application/json')
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});
