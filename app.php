<?php

date_default_timezone_set("UTC");

require __DIR__ . "/vendor/autoload.php";

//error_reporting(E_ALL);
//ini_set("display_errors", 1);

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$app = new \Slim\App([
    "settings" => [
        "displayErrorDetails" => true,
        "addContentLengthHeader" => false,
    ]
]);

require __DIR__ . "/config/dependencies.php";
require __DIR__ . "/config/middleware.php";

//TODO: Find a way to set for all non-valid routes
$app->get("/", function ($request, $response, $arguments) {
  return $response->withStatus(403);
});

require __DIR__ . "/routes/albums.php";
require __DIR__ . "/routes/artists.php";
require __DIR__ . "/routes/tracks.php";
require __DIR__ . "/routes/genres.php";

$app->run();
