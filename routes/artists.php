<?php

use MusicApp\Models\Artist;

$app->get("/artists", function ($request, $response, $arguments) {

    $artists = Artist::all();

    return $response->withStatus(200)
        ->withHeader("Content-Type", "application/json")
        ->write(json_encode($artists, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
});
