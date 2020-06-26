<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/offenders/{site}', function (Request $request, Response $response, $args): Response {
    if ($args["site"] == "twitter") {
        $example = [
            "lularoe" => "0680b520-0252-440f-953c-fcec27740a45",
            "noahbradley" => "4ed9aad9-a070-4fc4-9f9c-cfd87756e72d"
        ];
        $response->getBody()->write(json_encode($example));
        return $response->withHeader('Content-Type', 'application/json');
    } else if ($args["site"] == "websites") {
        $example = [
            "lularoe.com" => "0680b520-0252-440f-953c-fcec27740a45",
            "noahbradley.com" => "4ed9aad9-a070-4fc4-9f9c-cfd87756e72d"
        ];
        $response->getBody()->write(json_encode($example));
        return $response->withHeader('Content-Type', 'application/json');
    }
    $error = ["error" => "site argument not recognized"];
    $response->getBody()->write(json_encode($error));
    return $response->withHeader('Content-Type', 'application/json')->withStatus(404);
});

$app->get('/offender', function (Request $request, Response $response, $args): Response {
    $offenders = [
        [
            "name" => "LuLaRoe",
            "uuid" => "0680b520-0252-440f-953c-fcec27740a45",
            "counts" => [
                [
                    "name" => "multi-level-marketing",
                    "type" => "x",
                    "source" => [
                        "url" => "https://s3-us-west-2.amazonaws.com/llrprod/exigo/llrAdmin/documents/LLR_Ldr_Bonus_Plan.pdf",
                        "incident_timestamp" => 1586991598,
                        "reported_timestamp" => 1586991598,
                        "type" => "business presentation"
                    ],
                    "body" => "<p>LuLaRoe utilizes a rank-based distributor bonus compensation plan. The business plan also details requirements for each rank based on the profit totals and number of LuLaRoe clothing articles sold. </p><p>The ranks also require the following distributor recruitments (For all the numbers listed below, these goals are to be met at minimum, i.e. Sponsor requires to recruit <em>at least</em> 1 new distributor and not <em>exactly</em>):</p><p>Sponsor</p><ul><li>Recruit 1 new distributor each month</li></ul><p>Trainer</p><ul><li>Recruit 3 new distributors each month</li><li>Maintain 10 distributors in your downline</li></ul><p>Coach</p><ul><li>Recruit new distributors each month</li><li>Maintain 10 distributors in your downline, where 3 are rank Trainer or above</li></ul><p>Mentor</p><ul><li>Recruit 3 new distributors each month</li><li>Maintain 6 distributors in your immediate downline, where 3 are rank Coach and the rest are rank Trainer or above.</li></ul><p>Ambassador</p><ul><li>Recruit 3 new distributors each month</li><li>Maintain 15 distributors in your immediate downline, where 10 are rank Mentor and the rest are rank Coach or above.</li></ul>"
                ]
            ]
        ],
        [
            "name" => "Noah Bradley",
            "uuid" => "4ed9aad9-a070-4fc4-9f9c-cfd87756e72d",
            "counts" => [
                [
                    "name" => "rapist",
                    "type" => "x",
                    "source" => [
                        "url" => "https://twitter.com/DaniHartel/status/1275441880868634630",
                        "incident_timestamp" => "10:53 AM · Jun 23, 2020",
                        "reported_timestamp" => "before that",
                        "type" => "first-hand account"
                    ],
                    "body" => "Victim came forward with an accusation against Noah Bradley's predatory behavior."
                ]
            ]
        ]
    ];

    $params = $request->getQueryParams();
    if (!isset($params["uuid"])) {
        $error = ["error" => "missing field: uuid"];
        $response->getBody()->write(json_encode($error));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
    }
    foreach ($offenders as $offender) {
        if ($offender["uuid"] == $params["uuid"]) {
            $response->getBody()->write(json_encode($offender));
            return $response->withHeader('Content-Type', 'application/json');
        }
    }
    $error = ["error" => "uuid for offender not found"];
    $response->getBody()->write(json_encode($error));
    return $response->withHeader('Content-Type', 'application/json')->withStatus(404);
});

$app->run();
