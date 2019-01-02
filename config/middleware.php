<?php

use Tuupola\Middleware\HttpBasicAuthentication;
use Slim\Http\Response;

$container = $app->getContainer();

$container["HttpBasicAuthentication"] = function ($container) {

    return new HttpBasicAuthentication([
        // Relaxed = Allow insecure http request
        "relaxed" => ["192.168.50.52", "127.0.0.1", "localhost"],
        "error" => function ($request, $response) {
          return new Response(401);
        },
        "users" => [
            getenv("BASIC_USER") => getenv("BASIC_PASSWORD")
        ]
    ]);
};

$app->add("HttpBasicAuthentication");
