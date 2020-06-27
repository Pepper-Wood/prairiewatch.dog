<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Psr7\Response;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

// Add Routing Middleware
$app->addRoutingMiddleware();

// Define Custom Error Handler
$customErrorHandler = function (
    Request $request,
    Throwable $exception,
    bool $displayErrorDetails,
    bool $logErrors,
    bool $logErrorDetails
) use ($app) {
    $payload = ['error' => $exception->getMessage()];
    $response = $app->getResponseFactory()->createResponse();
    $response->getBody()->write(
        json_encode($payload, JSON_UNESCAPED_UNICODE)
    );
    return $response->withStatus(404)
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
};

/**
 * Add Error Handling Middleware
 *
 * @param bool $displayErrorDetails -> Should be set to false in production
 * @param bool $logErrors -> Parameter is passed to the default ErrorHandler
 * @param bool $logErrorDetails -> Display error details in error log
 * which can be replaced by a callable of your choice.
 *
 * Note: This middleware should be added last. It will not handle any exceptions/errors
 * for middleware added after it.
 */
$errorMiddleware = $app->addErrorMiddleware(true, true, true);
$errorMiddleware->setDefaultErrorHandler($customErrorHandler);


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

$app->get('/v0/offender/{uuid}', function (Request $request, ResponseInterface $response, $args): ResponseInterface {
    $offenders = [
        [
            "name" => "LuLaRoe",
            "uuid" => "0680b520-0252-440f-953c-fcec27740a45",
            "counts" => [
                [
                    "category" => "multi-level-marketing",
                    "subtype" => "x",
                    "source" => [
                        "url" => "https://s3-us-west-2.amazonaws.com/llrprod/exigo/llrAdmin/documents/LLR_Ldr_Bonus_Plan.pdf",
                        "incident_timestamp" => 1586991598,
                        "reported_timestamp" => 1586991598,
                        "type" => "business presentation"
                    ],
                    "body" => "<p>LuLaRoe utilizes a rank-based distributor bonus compensation plan. The business plan also details requirements for each rank based on the profit totals and number of LuLaRoe clothing articles sold. </p><p>The ranks also require the following distributor recruitments (For all the numbers listed below, these goals are to be met at minimum, i.e. Sponsor requires to recruit <em>at least</em> 1 new distributor and not <em>exactly</em>):</p><p>Sponsor</p><ul><li>Recruit 1 new distributor each month</li></ul><p>Trainer</p><ul><li>Recruit 3 new distributors each month</li><li>Maintain 10 distributors in your downline</li></ul><p>Coach</p><ul><li>Recruit new distributors each month</li><li>Maintain 10 distributors in your downline, where 3 are rank Trainer or above</li></ul><p>Mentor</p><ul><li>Recruit 3 new distributors each month</li><li>Maintain 6 distributors in your immediate downline, where 3 are rank Coach and the rest are rank Trainer or above.</li></ul><p>Ambassador</p><ul><li>Recruit 3 new distributors each month</li><li>Maintain 15 distributors in your immediate downline, where 10 are rank Mentor and the rest are rank Coach or above.</li></ul>"
                ]
            ],
            "social_media" => [
                "twitter" => [
                    "user_id" => 1586844356,
                    "handle" => "lularoe"
                ],
                "websites" => [
                    "lularoe.com"
                ]
            ]
        ],
        [
            "name" => "Noah Bradley",
            "uuid" => "4ed9aad9-a070-4fc4-9f9c-cfd87756e72d",
            "counts" => [
                [
                    "category" => "rapist",
                    "subtype" => "x",
                    "source" => [
                        "url" => "https://twitter.com/DaniHartel/status/1275441880868634630",
                        "incident_timestamp" => "10:53 AM · Jun 23, 2020",
                        "reported_timestamp" => "before that",
                        "type" => "first-hand account"
                    ],
                    "body" => "Victim came forward with an accusation against Noah Bradley's predatory behavior."
                ]
            ],
            "social_media" => [
                "twitter" => [
                    "user_id" => 14428486,
                    "handle" => "noahbradley"
                ],
                "websites" => [
                    "noahbradley.com"
                ]
            ]
        ]
    ];
    foreach ($offenders as $offender) {
        if ($offender["uuid"] == $args["uuid"]) {
            $example = [
                "offender" => $offender
            ];
            $response->getBody()->write(json_encode($example));
            return $response->withStatus(200)
                ->withHeader('Content-Type', 'application/json')
                ->withHeader('Access-Control-Allow-Origin', '*')
                ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
        }
    }
    $error = ["error" => "UUID for offender not found."];
    $response->getBody()->write(json_encode($error));
    return $response->withStatus(404)
        ->withHeader('Content-Type', 'application/json')
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$app->run();
