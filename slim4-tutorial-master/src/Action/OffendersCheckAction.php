<?php

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * Action
 */
final class OffendersCheckAction
{
    /**
     * Invoke.
     *
     * @param ServerRequestInterface $request The request
     * @param ResponseInterface $response The response
     *
     * @return ResponseInterface The response
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $result = [];
        $params = $request->getQueryParams();
        if (isset($params["twitter"])) {
            $url_text = file_get_contents("https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/database/generated/twitter_handles.json");
            $twitter_handles = json_decode($url_text, true);
            $handles = explode(",", $params["twitter"]);
            foreach ($handles as $handle) {
                if (isset($twitter_handles[$handle])) {
                    $url_offender = "https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/database/offenders/" . $twitter_handles[$handle] . ".yml";
                    $url_text = file_get_contents($url_offender);
                    $result[] = Yaml::parse($url_text);
                }
            }
        }
        if (isset($params["url"])) {
            $url_text = file_get_contents("https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/database/generated/websites.json");
            $websites_list = json_decode($url_text, true);
            $url_param = $params["url"];
            $url_matches = array_filter($websites_list, function($url_key) use($url_param) {
                // return true if url_key is a substring of the url_param
                // i.e., param might be https://lularoe.com/products/amelia
                //       key would be lularoe.com
                return (strpos($url_param, $url_key) !== false);
            }, ARRAY_FILTER_USE_KEY);
            foreach ($url_matches as $url_match) {
                $url_offender = "https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/database/offenders/" . $websites_list[$url_match] . ".yml";
                $url_text = file_get_contents($url_offender);
                $result[] = Yaml::parse($url_text);
            }
        }
        $example = [
            "total" => count($result),
            "offenders" => $result
        ];

        $response->getBody()->write((string)json_encode($example));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
