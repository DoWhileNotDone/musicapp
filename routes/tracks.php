<?php

use MusicApp\Models\Track;

$app->get("/tracks", function ($request, $response, $arguments) {

    $tracks = Track::all();

    return $response->withStatus(200)
        ->withHeader("Content-Type", "application/json")
        ->write(json_encode($tracks, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
});
