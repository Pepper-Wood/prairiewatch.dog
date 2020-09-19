<?php

use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class);
    $app->get('/users/{id}', \App\Action\UserReadAction::class);
    $app->post('/users', \App\Action\UserCreateAction::class);

    $app->get('/v0/status', \App\Action\HomeAction::class);
    $app->get('/v0/offenders', \App\Action\OffendersCheckAction::class);
    $app->get('/v0/offenders/{uuid}', \App\Action\OffendersGetAction::class);
};
