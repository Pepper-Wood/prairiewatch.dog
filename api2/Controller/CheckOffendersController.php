<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Symfony\Component\Yaml\Yaml;

class CheckOffendersController
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
    public function checkOffenders(Request $request, Response $response): Response {
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
        return $this->format_response($response, $example, 200);
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
